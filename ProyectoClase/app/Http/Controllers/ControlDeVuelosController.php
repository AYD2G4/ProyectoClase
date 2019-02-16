<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aeropuerto;
use App\Avion;
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
        $Aeropuertos=DB::table('aeropuerto as A')->get();
        $Aviones=DB::table('avion as Av')->get();
        /**
         * retorno de la vista Registro de Vuelos
         * 
         * return view('CrearGrupo.GruposCreados')->with("Aeropuertos",$Aeropuertos)->with("contador",0);                
        **/
        return view('ControlDeVuelos.RegistroDeVuelos')->with("Aeropuertos",$Aeropuertos)->with("Aviones",$Aviones);
    }
    //funcion que devuelve toda la informacion de los aviones de la BD
    public function ObtenerAvionesBD(){
        $aviones=DB::table('avion')
                ->get();
        return $aviones;
    }
}
