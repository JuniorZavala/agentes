<?php

namespace App\Http\Controllers;

use App\Models\Agentes;
use Illuminate\Http\Request;

class AgentesController extends Controller
{
   public function mostrarAgentes(Request $request){
    $agentes = Agentes::with('empresa')->get();
    return view('dashboard', ['agentes' => $agentes]);
   }

   public function show(Agentes $agente){
    return view('agente-edit',['agente' => $agente]);
   }

   /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }
        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
