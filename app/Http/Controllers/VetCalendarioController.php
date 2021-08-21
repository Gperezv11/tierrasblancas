<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calendario;
use Carbon\Carbon;
use App\Models\VetMedico;
use App\Models\VetCliente;

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

    public function frcc(Request $request)
    {
        $data = VetCliente::select('*')->where('rut', $request->rut)->take(100)->get();

        return response()->json($data);
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
        $date = new Carbon($c->start);
        $date = $date->format('d/m/Y');
        $datetime = new Carbon($c->start);
        $datetime = $datetime->format('H:i');
        Mail::to($c->email)->send(new TestMail($c,$date,$datetime));
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
        $date = new Carbon($evento->start);
        $date = $date->format('d/m/Y');
        $datetime = new Carbon($evento->start);
        $datetime = $datetime->format('H:i');
        Mail::to(request('email'))->send(new EmailEdit($evento,$date,$datetime));
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
        $eliminar = Calendario::find($id);
        $evento = Calendario::find($id)->delete();
        $date = new Carbon($eliminar['start']);
        $date = $date->format('d/m/Y');
        $datetime = new Carbon($eliminar['start']);
        $datetime = $datetime->format('H:i');
        Mail::to($eliminar['email'])->send(new EmailDelete($eliminar,$date,$datetime));
        return response()->json($evento);
    }

    public function Recordatorio($id){
        $dateactual = new Carbon();
        $dateactual = $dateactual->toDateString();
        $recordar = Calendario::find($id);
        $datep = new Carbon($recordar['start']);
        $datep = $datep->toDateString();
        if($dateactual == $datep){
          $dia = 'hoy';
        }
        $dia = 'mañana';
        $date = new Carbon($recordar['start']);
            $date = $date->format('d/m/Y');
            $datetime = new Carbon($recordar['start']);
            $datetime = $datetime->format('H:i');
          Mail::to($recordar['email'])->send(new EmailRecordatorio($recordar,$date,$datetime,$dia));
    }

}
