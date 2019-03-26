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
        ->select('V.id as id', 'V.fechasalida as fechaS', 'V.horasalida as horaS', 
                 'V.fechallegada as fechaL', 'V.horallegada as horaL',
                 'A.codigo as avion')->get();
       
        /**
         * retorno de la vista Manejo Horarios
         * 
        **/
        return view('ManejoHorarios.ManejoDeHorarios')->with("Horarios",$Horarios);
    }

    public function Editar($id){
        
        $Horarios=DB::table('registro_vuelo as V')
            ->join('avion as A', 'A.id', '=', 'V.avion')
            ->select('V.id as id', 'V.fechasalida as fechaS', 'V.horasalida as horaS',
                 'V.fechallegada as fechaL', 'V.horallegada as horaL',
                 'A.codigo as avion', 'V.avion as avionID', 'V.vuelo as Vuelo')
                ->where('V.id', '=', $id)->get();

        /**
         * retorno de la vista Editor de Horarios
         * 
        **/
        return view('ManejoHorarios.EditarHorario')->with("Horarios",$Horarios);
      }

    public function EditarG(Request $request,$id){
        $RegistroVuelo=Registro_Vuelo::find($id);
        $RegistroVuelo->fechasalida=$request->input('FechaSalida');
        $RegistroVuelo->horasalida=$request->input('HoraSalida');
        $RegistroVuelo->fechallegada=$request->input('FechaLlegada');
        $RegistroVuelo->horallegada=$request->input('HoraLlegada');

        $RegistroVuelo->save();
        /**
         * retorno de la vista Registro de Vuelos
         * 
        **/
        return Redirect::to('/manejoDeHorarios');
    }




}
