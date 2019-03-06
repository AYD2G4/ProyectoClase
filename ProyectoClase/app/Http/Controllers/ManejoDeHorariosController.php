<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Aeropuerto;
use App\Avion;
use App\Vuelo;
use App\Registro_Vuelo;
use DB;

class ManejoDeHorariosController extends Controller
{
    //Pagina principal de Manejo de Horarios
    public function ManejoDeHorarios(){
        $Horarios=DB::table('registro_vuelo as V')
        ->join('avion as A', 'A.id', '=', 'V.avion')
        ->select('V.fechasalida as fechaS', 'V.horasalida as horaS', 
                 'V.fechallegada as fechaL', 'V.horallegada as horaL',
                 'A.codigo as avion')->get();
       
        /**
         * retorno de la vista Manejo Horarios
         * 
        **/
        return view('ManejoHorarios.ManejoDeHorarios')->with("Horarios",$Horarios);
    }

}
