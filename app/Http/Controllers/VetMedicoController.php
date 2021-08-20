<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VetMedico;
use App\Models\VetEspecialidad;

class VetMedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medico = VetMedico::all();
        $especialidad = VetEspecialidad::all();
        return view('ma.vetdoctor')->with('medico', $medico)->with('especialidad', $especialidad);
    }

    public function formatoRut(Request $request)
    {

        function formatorut($rut_param)
        {
            $parte1 = substr($rut_param, 0, 2); //12
            //Log::error($parte1);
            $parte2 = substr($rut_param, 2, 3); //345
            //Log::error($parte2);
            $parte3 = substr($rut_param, 5, 3); //456
            //Log::error($parte3);
            $parte4 = substr($rut_param, 8);   //todo despues del caracter 8
            //Log::error($parte4);
            return $parte1 . "." . $parte2 . "." . $parte3 . "-" .  $parte4;
        }
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

        // $vet->rut = $request->rut;
        // $vet->nombre = $request->nom_inp;
        // $vet->apellido_p = $request->pat_inp;
        // $vet->apellido_m = $request->mat_inp;
        // $vet->vet_especialidads_id = $request->esp_inp;
        // $vet->codigo = $request->cod_inp;

        VetMedico::create($request->all());

        return redirect('vetmedico');
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
        $m = VetMedico::find($id);

        $m->rut                     =   $request->rut;
        $m->nombre                  =   $request->nom_edit;
        $m->apellido_p              =   $request->pat_edit;
        $m->apellido_m              =   $request->mat_edit;
        $m->vet_especialidads_id    =   $request->esp_edit;
        $m->codigo                  =   $request->cod_edit;

        $m->save();

        return redirect('vetmedico');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $med = VetMedico::find($id);
        $med->delete();

        return redirect('vetmedico');
    }
}
