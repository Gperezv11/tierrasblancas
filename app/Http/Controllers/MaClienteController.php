<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comuna;
use App\Models\Region;
use App\Models\VetCliente;
use App\Models\VetMascota;

class MaClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comuna = Comuna::all();
        $region = Region::all();
        return view('ma.cliente')->with('comuna', $comuna)->with('region', $region);
    }

    public function findComuna(Request $request)
    {
        $data = Comuna::select('nombre', 'id')->where('region_id', $request->id)->take(100)->get();

        return response()->json($data);
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
        $cliente_rut = $request->rut;

        $found = VetCliente::where('rut', $cliente_rut)->count();

        if ($found == 0) {
            $vc = new VetCliente;

            $vc->rut = $request->rut;
            $vc->nombre = $request->nombre;
            $vc->apellido_p = $request->apellido_p;
            $vc->apellido_m = $request->apellido_m;
            $vc->comuna_id = $request->comuna;
            $vc->direccion = $request->direccion;
            $vc->sector = $request->sector;
            $vc->correo = $request->correo;
            $vc->telefono = $request->telefono;
            $vc->referencia = $request->referencia;

            $vc->save();
        }

        return response()->json($data);
    }

    public function rutFinder(Request $request)
    {
        $data = Vetcliente::select('*')->where('rut', $request->rut)->get();

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
