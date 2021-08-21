<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VetMascota;
use App\Models\VetMedico;

class VetMascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mascota = VetMascota::all();
        return view('ma.vetmascotas')->with('mascota', $mascota);
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
        $data = 'Ingreso completado satisfactoriamente';
        $vm = new VetMascota;

        $vm->nombre = $request->nombre;
        $vm->raza = $request->raza;
        $vm->especie = $request->especie;
        $vm->edad = $request->edad;
        $vm->vet_clientes_id = $request->vet_clientes_id;

        $vm->save();

        return response()->json($data);
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
        $m = VetMascota::find($id);

        $m->nombre          =   $request->nombre_edit;
        $m->especie         =  $request->especie_edit;
        $m->raza            =   $request->raza_edit;
        $m->edad            =   $request->edad_edit;          

        $m->save();

        return redirect('vetmascota');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $m = VetMascota::find($id);
        $m->delete();

        return redirect('vetmascota');
    }
}
