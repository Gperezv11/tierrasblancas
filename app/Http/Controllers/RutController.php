<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RutController extends Controller
{
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
}
