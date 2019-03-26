<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Aeropuerto;
use App\Avion;
use App\Vuelo;
use App\Registro_Vuelo;
use App\Paquete;
use DB;

class PaqueteriaController extends Controller
{
    public function menu(){
        return view('ControlDeVuelos.ControlDeVuelos');
    }
    
    public function ListarPaquetes()
    {
        $paquetes = Paquete::get();
        return view('Paqueteria.ListarPaquetes')->with('paquetes', $paquetes);
    }

    public function RegistrodePaquetes(){
        $Vuelos=DB::table('vuelo as V')
        ->join('aeropuerto as A1', 'A1.id', '=', 'V.aeropuertosalida')
        ->join('aeropuerto as A2', 'A2.id', '=', 'V.aeropuertodestino')
        ->select('V.id as id', 'A1.nombre as aeropuertosalida', 'A2.nombre as aeropuertodestino')->get();
        $Aviones=DB::table('avion as A')->get();
        /**
         * retorno de la vista Registro de Paquetes
         * 
        **/
        return view('Paqueteria.RegistroDePaquetes')->with("Vuelos",$Vuelos)->with("Aviones",$Aviones);
    }

    public function MetodoCrearPaquete($vuelo, $libras, $desc, $alto, $ancho, $largo, $estado){
        $paquete=new Paquete();
        $paquete->vuelo=$vuelo;
        $paquete->libras=$libras;
        $paquete->desc=$desc;
        $paquete->alto=$alto;
        $paquete->ancho=$ancho;
        $paquete->largo=$largo;
        $paquete->estado=$estado;
        $paquete->save();
        return $paquete;
    }

    public function RegistrodePaquetesGuardar(Request $request){
        $this->MetodoCrearPaquete($request->input('vuelo'), 
                $request->input('libras'), $request->input('desc'), $request->input('alto'),
                $request->input('ancho'), $request->input('largo'), 'En espera');
        /**
         * retorno de la vista Registro de Paquetes
         * 
        **/
        return Redirect::to('/registroDePaquetes');
    }

    public function PaquetesAprobar($paquete_id){
        $paquete=Paquete::where('id', $paquete_id)->first();;
        $paquete->estado='Aprobado';
        $paquete->save();
        /**
         * retorno de la vista Registro de Paquetes
         * 
        **/
        return Redirect::to('/ListarPaquetes');
    }

    public function PaquetesCancelar($paquete_id){
        $paquete=Paquete::where('id', $paquete_id)->first();;
        $paquete->estado='Cancelar';
        $paquete->save();
        /**
         * retorno de la vista Registro de Paquetes
         * 
        **/
        return Redirect::to('/ListarPaquetes');
    }

    public function PaquetesEsperar($paquete_id){
        $paquete=Paquete::where('id', $paquete_id)->first();;
        $paquete->estado='En espera';
        $paquete->save();
        /**
         * retorno de la vista Registro de Paquetes
         * 
        **/
        return Redirect::to('/ListarPaquetes');
    }

    public function PaquetesPerdido($paquete_id){
        $paquete=Paquete::where('id', $paquete_id)->first();;
        $paquete->estado='Perdido';
        $paquete->save();
        /**
         * retorno de la vista Registro de Paquetes
         * 
        **/
        return Redirect::to('/ListarPaquetes');
    }

    public function PaquetesEliminar($paquete_id){
        $paquete=Paquete::where('id', $paquete_id)->first();;
        $paquete->delete();
        /**
         * retorno de la vista Registro de Paquetes
         * 
        **/
        return Redirect::to('/ListarPaquetes');
    }
    
}
