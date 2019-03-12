<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cargos;

class CargosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
    }

    public function VistaCrearCargo(){
        return view('Cargo.CrearCargo');
    }
    public function VistaGuardarCargo(Request $request){
        $nombre =  $request->input('nombreCargo');
        $this->MetodoCrearCargo($nombre);
        return redirect('ListarCargos');
    }

    public function VistaListarCargo(){
        return view('Cargo.ListarCargo')
            ->with('colleccion',Cargos::get());
    }

    public function MetodoCrearCargo($nombreCargo){
        $cargo = new Cargos();
        $cargo->nombrecargo = $nombreCargo;
        $cargo->save();
        return $cargo;
    }

    public function VistaEliminarCargo($idCargo){
        $this->MetodoEliminarCargo($idCargo);
        return redirect('ListarCargos');
    }

    public function MetodoObtenerCargo($idCargo){
        return Cargos::where('id',$idCargo)->first();
    }

    public function MetodoEliminarCargo($idCargo){
        Cargos::where('id',$idCargo)->first()->delete();
    }
}
