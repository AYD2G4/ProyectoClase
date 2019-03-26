<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Avion;

class AvionController extends Controller
{
    public function MetodoCrearAvion($capacidad, $codigo, $estado, $marca){
        $avion = new Avion();
        $avion->capacidad = $capacidad;
        $avion->codigo = $codigo;
        $avion->estado = $estado;
        $avion->marca = $marca;
        $avion->save();
        return $avion;
    }

    public function VistaGuardarAvion(Request $request){
        $capacidad =  $request->input('Capacidad');
        $codigo =  $request->input('Codigo');
        $estado =  $request->input('Estado');
        $marca =  $request->input('Marca');
        $this->MetodoCrearAvion($capacidad, $codigo, $estado, $marca);
        return redirect('ListarAviones');
    }

    public function MetodoEliminarAvion($idAvion){
        Avion::where('id',$idAvion)->first()->delete();
    }

    public function MetodoObtenerAvion($idAvion){
        return Avion::where('id',$idAvion)->first();
    }


    public function VistaCrearAvion(){
        return view('Avion.CrearAvion');
    }

    public function VistaListarAvion(){
        return view('Avion.ListarAvion')
            ->with('colleccion',Avion::get());
    }
    public function VistaEliminarAvion($idAvion){
        $this->MetodoEliminarAvion($idAvion);
        return redirect('ListarAviones');
    }

}
