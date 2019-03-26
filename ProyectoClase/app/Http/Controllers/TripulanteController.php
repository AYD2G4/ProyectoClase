<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleados;
use App\Tripulantes;
use App\Cargos;
use App\ObjetoTripulante;
use Illuminate\Support\Collection;

class TripulanteController extends Controller
{
    public function VistaListarTripulacion($registro_vuelo_id){
        $Tripulantes = Tripulantes::where('registro_vuelo_id',$registro_vuelo_id)->get();
        $colleccion = new Collection();
        foreach($Tripulantes as $Tripulante){
            $obj = new ObjetoTripulante();
            $empleado = Empleados::where('id',$Tripulante->empleado_id)->first();
            $obj-> Empleado = $empleado;
            $cargo = Cargos::where('id',$Tripulante->cargo_id)->first();
            $obj->Cargo = $cargo;
            $obj->Tripulante = $Tripulante;
            $colleccion->push($obj);
        }
        return view('Tripulacion.VerTripulacion')
        ->with('registro_vuelo_id',$registro_vuelo_id)
        ->with('colleccion',$colleccion);
    }
    public function VistaListarEmpleadoSeleccionar($registro_vuelo_id,$cargo_id){
        return view('Tripulacion.SeleccionarEmpleado')
            ->with('colleccion',Empleados::get())
            ->with('registro_vuelo_id',$registro_vuelo_id)
            ->with('cargo_id',$cargo_id);
    }

    public function AsignarTripulante($registro_vuelo_id,$cargo_id,$idEmpleado){
        $tripulante = new Tripulantes();
        $tripulante->registro_vuelo_id=$registro_vuelo_id;
        $tripulante->cargo_id=$cargo_id;
        $tripulante->empleado_id=$idEmpleado;
        $tripulante->save();
        return redirect('ListarTripulacion/'.$registro_vuelo_id);
    }
    public function QuitrarTripulante($registro_vuelo_id,$idtripulante){
        Tripulantes::where('id',$idtripulante)->first()->delete();
        return redirect('ListarTripulacion/'.$registro_vuelo_id);
    }
}
