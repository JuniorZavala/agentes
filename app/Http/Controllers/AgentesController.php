<?php

namespace App\Http\Controllers;

use Faker\Core\File;
use App\Models\Agentes;
use App\Models\Empresas;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Isset_;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

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

        // Update photo
        if ($request->hasFile('foto')) {
            Storage::delete($agente->foto);

            $path = $request->file('foto')->store('users');

            $agente->update([
                'foto' => $path,
            ]);
        }
        // Update data
        $agente->update([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'dni' => $request->dni,
            'cod_socio' => $request->cod_socio,
            'telefono' => $request->telefono,
            'empresa_id' => $request->empresa_id,
        ]);

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
        $path = $request->file('foto')->store('users');

        Agentes::create([
            'foto' => $path,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'dni' => $request->dni,
            'cod_socio' => $request->cod_socio,
            'telefono' => $request->telefono,
            'empresa_id' => $request->empresa_id,

        ]);
        return redirect()->back();
    }
}
