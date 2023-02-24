<?php

namespace App\Http\Controllers;

use App\Models\Agentes;
use App\Models\Empresas;
use Faker\Core\File;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Isset_;

class AgentesController extends Controller
{
    public function mostrarAgentes(Request $request)
    {
        $agentes = Agentes::with('empresa')->get();
        $empresas = Empresas::all();
        return view('dashboard', ['agentes' => $agentes, 'empresas' => $empresas]);
    }

    /**
     * Show the detail of the  Agent
     * @param Agentes $agente
     *
     */

    public function show(Agentes $agente)
    {
        $agente = $agente->with(['empresa']);
        return $agente;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Agentes $agente)
    {
        $agente = $agente->load('empresa');
        $empresas = Empresas::all();
        return view('agente-edit', ['agente' => $agente, 'empresas' => $empresas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Agentes $agente, Request $request)
    {
        $data = $request->all();
        if ($request->file('foto')) {
            if (isset($agente->foto)) {
                $pathfile = explode("/", $agente->foto, 4)[3];
                $this->destroyFile($pathfile);
            }
            $data['foto'] = $this->loadFile($request, 'foto', 'users');
        }
        // $data['empresa_id'] = (integer) $request->empresa_id;
        $agente->update($data);
        $agentes = Agentes::with('empresa')->get();
        $empresas = Empresas::all();
        return view('dashboard', ['agentes' => $agentes, 'empresas' => $empresas])->with('success', 'El agente se edito correctamente');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agentes $agente)
    {
        $agente->delete();
        return redirect('dashboard');
    }


    public function store(Request $request)
    {
        Agentes::create($request->all());
        return redirect('dashboard');
    }
}
