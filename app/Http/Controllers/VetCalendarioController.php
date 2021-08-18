<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calendario;
use Carbon\Carbon;
use App\Models\VetMedico;

class VetCalendarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicos = VetMedico::all();
        return view('ma.calendario')->with('medicos', $medicos);
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
        $c = new Calendario;

        $c->title = $request->title;
        $c->medico = $request->medico;
        $c->rut_cliente = $request->rut_cliente;
        $c->nombre_cliente = $request->nombre_cliente;
        $c->email = $request->email;
        $c->fono = $request->fono;
        $c->descripcio = $request->descripcion;
        $c->start = $request->start;
        $c->end = $request->end;

        $c->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Calendario $evento)
    {
        $evento = Calendario::all();
        return response()->json($evento);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evento = Calendario::find($id);
        return response()->json($evento);
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
        $evento = Calendario::find($id);

        $evento->title = $request->title;
        $evento->medico = $request->medico;
        $evento->rut_cliente = $request->rut_cliente;
        $evento->nombre_cliente = $request->nombre_cliente;
        $evento->email = $request->email;
        $evento->fono = $request->fono;
        $evento->descripcio = $request->descripcion;
        $evento->start = $request->start;
        $evento->end = $request->end;

        $evento->save();
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
        $evento = Calendario::find($id)->delete();
        return response()->json($evento);
    }
}
