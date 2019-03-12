<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservacion;
class ReservacionController extends Controller
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

    /***
     * Este metodo servira para la creacion de reservaciones
     * por el momento en esta iteracion se trabajara con un
     * cliente por defecto en la BD. Pero conforme se hagan
     * mas iteraciones se pondra codigo mas general.
     */
    public function CrearReservacion($idRegistroVuelo)
    {
        $this->MetodoCrearReservacion($idRegistroVuelo);
        return redirect('VerReservaciones');
    }

    /**
     *
     */
    public function MetodoCrearReservacion($idRegistroVuelo){
        $reservaciones =new Reservacion();
        $reservaciones->fechahora =  date('Y-m-d H:i:s');
        $reservaciones->estado = 0;
        $reservaciones->cliente_id = 1;//El cliente 1 hay que cambiarlo por el id del cliente logeado
        $reservaciones->registrovuelo_id = $idRegistroVuelo;
        $reservaciones->save();
        return $reservaciones;
    }

    public function QuitarReservacion($idReservacion)
    {
        $this->MetodoQuitarReservacion($idReservacion);
        return redirect('VerReservaciones');
    }

    public function MetodoQuitarReservacion($idReservacion){
        $reservaciones =Reservacion::where('id', $idReservacion)->first();
        $reservaciones->delete();
    }

    /**
     * Este medo lista todas las reservaciones del usuario
     * por defecto en la tabla de simbolos.
     */
    public function ListarReservaciones()
    {
        $reservaciones =$this->MetodoListarReservacionesCliente();
        return view('ReservacionBoleto.VerReservaciones')->with('reservaciones', $reservaciones);
    }

    public function MetodoListarReservacionesCliente(){
        return Reservacion::where('cliente_id', '1')->get();// En vez de usuario 1 debe ser el usuario logeado
    }

    public function MetodoObtenerReservacion($idReservacion){
        $reservaciones =Reservacion::where('id', $idReservacion)->first();
        return $reservaciones;
    }
}
