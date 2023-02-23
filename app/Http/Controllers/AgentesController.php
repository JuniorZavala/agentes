<?php

namespace App\Http\Controllers;

use App\Models\Agentes;
use App\Models\Empresas;
use Faker\Core\File;
use Illuminate\Http\Request;

class AgentesController extends Controller
{
    public function mostrarAgentes(Request $request)
    {
        $agentes = Agentes::with('empresa')->get();
        return view('dashboard', ['agentes' => $agentes]);
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
        $file = $request->file('foto');
        $fileModel = new File;
        if($request->file()) {
            dd($fileModel);
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
            $fileModel->name = time().'_'.$request->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->save();
            return back()
            ->with('success','File has been uploaded.')
            ->with('file', $fileName);
        }
        $agente->empresa_id = (integer) $request->empresa_id;
        $agente->update($request->all());
        $agentes = Agentes::with('empresa')->get();
        return view('dashboard', ['agentes' => $agentes])->with('success', 'El agente se edito correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
