<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Avion;
use DB;

class AvionController extends Controller
{
    public function MetodoCrearAvion($capacidad, $codigo, $estado, $marca){
        DB::insert('insert into avion (capacidad, codigo,estado, marca) values (?, ?, ?, ?)', [$capacidad,  $codigo, $estado, $marca]);
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
        $aviones=DB::table('avion as c')
        ->where('c.id', 'LIKE', '%'.$idAvion.'%')
        ->select('c.capacidad as capacidad', 'c.codigo as codigo', 'c.estado as estado',
                'c.marca as marca')
        ->delete();
    }

    public function MetodoObtenerAvion($idAvion){
        return Avion::where('id',$idAvion)->first();
    }


    public function VistaCrearAvion(){
        return view('Avion.CrearAvion');
    }

    public function VistaListarAvion(){
        $aviones=DB::table('avion as c')
        ->where('c.id', 'LIKE', '%'.$idAvion.'%')
        ->select('c.capacidad as capacidad', 'c.codigo as codigo', 'c.estado as estado',
                'c.marca as marca')
                ->get();
        return view('Avion.ListarAvion')
            ->with('colleccion',$aviones);
    }
    public function VistaEliminarAvion($idAvion){
        $this->MetodoEliminarAvion($idAvion);
        return redirect('ListarAviones');
    }

}
