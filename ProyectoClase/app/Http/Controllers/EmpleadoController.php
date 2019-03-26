<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleados;

class EmpleadoController extends Controller
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

    public function MetodoCrearEmpleado($nombre, $telefono, $dpi, $telefonoemergencia, $fechanac){
        $empleado = new Empleados();
        $empleado->nombre = $nombre;
        $empleado->telefono = $telefono;
        $empleado->dpi = $dpi;
        $empleado->telefonoemergencia = $telefonoemergencia;
        $empleado->fechanac = $fechanac;
        $empleado->save();
        return $empleado;
    }

    public function VistaGuardarEmpleado(Request $request){
        $Nombre =  $request->input('Nombre');
        $Telefono =  $request->input('Telefono');
        $Dpi =  $request->input('Dpi');
        $TelefonoEmergencia =  $request->input('TelefonoEmergencia');
        $FechaNac =  $request->input('FechaNac');
        $this->MetodoCrearEmpleado($Nombre, $Telefono, $Dpi, $TelefonoEmergencia, $FechaNac  );
        return redirect('ListarEmpleado');
    }


    public function VistaEliminarEmpleado($idEmpleado){
        $this->MetodoEliminarEmpleado($idEmpleado);
        return redirect('ListarEmpleado');
    }

    public function MetodoObtenerEmpleado($idEmpleado){
        return Empleados::where('id',$idEmpleado)->first();
    }

    public function MetodoEliminarEmpleado($idEmpleado){
        Empleados::where('id',$idEmpleado)->first()->delete();
    }

    public function VistaCrearEmpleado(){
        return view('Empleado.CrearEmpleado');
    }

    public function VistaListarEmpleado(){
        return view('Empleado.ListarEmpleado')
            ->with('colleccion',Empleados::get());
    }

}
