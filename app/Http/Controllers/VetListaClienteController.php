<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VetCliente;

class VetListaClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cliente = VetCliente::all();
        return view('ma.vetlistacliente')->with('cliente', $cliente);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $c = VetCliente::find($id);

        $c->rut                 =   $request->rut_edit;
        $c->nombre              =   $request->nombre_edit;
        $c->apellido_p          =   $request->apellidop_edit;
        $c->apellido_m          =   $request->apellidom_edit;
        $c->direccion           =   $request->direc_edit;
        $c->sector              =   $request->sector_edit;
        $c->correo              =   $request->correo_edit;                      
        $c->telefono            =   $request->telefono_edit;            
        $c->referencia          =   $request->referencia_edit;          

        $c->save();

        return redirect('lvetcliente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $med = VetCliente::find($id);
        $med->delete();

        return redirect('lvetcliente');
    }
}
