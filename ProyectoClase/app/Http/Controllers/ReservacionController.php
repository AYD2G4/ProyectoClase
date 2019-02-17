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
        $reservaciones =new Reservacion();
        $reservaciones->fechahora =  date('Y-m-d H:i:s');
        $reservaciones->estado = 0;
        $reservaciones->cliente_id = 1;
        $reservaciones->registrovuelo_id = $idRegistroVuelo;
        $reservaciones->save();
        return redirect('VerReservaciones');
    }

    public function QuitarReservacion($idReservacion)
    {
        $reservaciones =Reservacion::where('cliente_id', '1')->first();
        $reservaciones->delete();
        return redirect('VerReservaciones');
    }

    /**
     * Este medo lista todas las reservaciones del usuario
     * por defecto en la tabla de simbolos.
     */
    public function ListarReservaciones()
    {

        $reservaciones =Reservacion::where('cliente_id', '1')->get();
        return view('ReservacionBoleto.VerReservaciones')->with('reservaciones', $reservaciones);
    }
}