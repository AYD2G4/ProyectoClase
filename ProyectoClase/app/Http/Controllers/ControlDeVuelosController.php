<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Aeropuerto;
use App\Avion;
use App\Vuelo;
use App\Registro_Vuelo;
use DB;

class ControlDeVuelosController extends Controller
{
    public function menu(){
        return view('ControlDeVuelos.ControlDeVuelos');
    }
    //Obtener la informacion de los aviones
    public function estadoAviones(){
        $aviones=$this->ObtenerAvionesBD();//Obtengo el arreglo de aviones
        return view('ControlDeVuelos.EstadoAviones')//devuelvo la vista
        ->with("aviones", $aviones);//con el arreglo
    }

    public function RegistrodeVuelos(){
        $Vuelos=DB::table('vuelo as V')
        ->join('aeropuerto as A1', 'A1.id', '=', 'V.aeropuertosalida')
        ->join('aeropuerto as A2', 'A2.id', '=', 'V.aeropuertodestino')
        ->select('V.id as id', 'A1.nombre as aeropuertosalida', 'A2.nombre as aeropuertodestino')->get();
        $Aviones=DB::table('avion as A')->get();
        /**
         * retorno de la vista Registro de Vuelos
         * 
        **/
        return view('ControlDeVuelos.RegistroDeVuelos')->with("Vuelos",$Vuelos)->with("Aviones",$Aviones);
    }

    public function RegistroDeVuelosGuardar(Request $request){
        $RegistroVuelo=new Registro_Vuelo();
        $RegistroVuelo->fechasalida=$request->input('FechaSalida');
        $RegistroVuelo->horasalida=$request->input('HoraSalida');
        $RegistroVuelo->fechallegada=$request->input('FechaLlegada');
        $RegistroVuelo->horallegada=$request->input('HoraLlegada');
        $RegistroVuelo->vuelo=$request->input('Vuelo');
        $RegistroVuelo->avion=$request->input('Avion');
        
        print_r($request->input('FechaSalida'));

        $RegistroVuelo->save();
        /**
         * retorno de la vista Registro de Vuelos
         * 
        **/
        return Redirect::to('/registroDeVuelos');
    }
    public function Vuelos(){
        $Aeropuertos=DB::table('aeropuerto as A')->get();
        /**
         * retorno de la vista Registro de Vuelos
         * 
        **/
        return view('ControlDeVuelos.Vuelos')->with("Aeropuertos",$Aeropuertos);
    }

    public function VuelosGuardar(Request $request){
        $Vuelo=new Vuelo();
        $Vuelo->aeropuertosalida=$request->input('AeropuertoSalida');
        $Vuelo->aeropuertodestino=$request->input('AeropuertoLlegada');
        $Vuelo->save();
        /**
         * retorno de la vista Registro de Vuelos
         * 
        **/
        return Redirect::to('/vuelos/');
    }


    //funcion que devuelve toda la informacion de los aviones de la BD
    public function ObtenerAvionesBD(){
        $aviones=DB::table('avion')
                ->get();
        return $aviones;
    }
}
