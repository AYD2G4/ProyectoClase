<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservacion;
use App\DetalleCompraAux;
use App\Boleto;
use App\Registro_Vuelo;
use App\ObjetoregistroVuelo;
use App\Vuelo;
use App\Aeropuerto;
use App\Http\Controllers\RegistroVueloController;
use App\Http\Controllers\DetalleCompraAuxiliarController;
use Illuminate\Support\Collection;


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
    public function CrearReservacion($boleto_id)
    {
        $this->MetodoCrearReservacion($boleto_id);
        return redirect('VerReservaciones');
    }

    /**
     *
     */
    public function MetodoCrearReservacion($boleto_id){
        $reservaciones =new Reservacion();
        $reservaciones->fechahora =  date('Y-m-d H:i:s');
        $reservaciones->cliente_id = 1;
        $reservaciones->boleto_id = $boleto_id;
        $boleto = Boleto::where('id',$boleto_id)->first();
        $reservaciones->vuelo_id = $boleto->vuelo_id;
        $reservaciones->registro_vuelo_id = $boleto->registro_vuelo_id;
        $reservaciones->save();
        return $reservaciones;
    }

    public function CrearCantidadReservacion($registro_vuelo_id, $cantidad){
        $controller = new DetalleCompraAuxiliarController();
        if($controller->VerificarDisponibilidadBoletosLibres($registro_vuelo_id,$cantidad)){
            $controllerRegistroVuelo = new RegistroVueloController();
            $BoletosLibres = $controllerRegistroVuelo->ObtenerBoletosEstado($registro_vuelo_id,0);
            for($x=0;$x<$cantidad;$x++){
                $boleto = $BoletosLibres[$x];
                $boleto->estado = 1;
                $boleto->save();
                $this->CrearReservacion($boleto->id);
            }
        }
        return redirect('VerReservaciones');
    }

    public function QuitarReservacion($boleto_id)
    {
        $reservaciones =Reservacion::where('boleto_id', $boleto_id)->first();
        $reservaciones->delete();
    }

    public function QuitarCantidadReservacion(Request $request,$registro_vuelo_id){
        $cantidad =  $request->input('cantidad');
        $reservacionesX =Reservacion::where('cliente_id', '1')->where('registro_vuelo_id',$registro_vuelo_id)->get()->pluck('boleto_id');
        $Boletos = Boleto::whereIn('id',$reservacionesX)->get();
        for($x=0;$x<$cantidad;$x++){
            $boleto = $Boletos[$x];
            $boleto->estado = 0;
            $boleto->save();
            $this->QuitarReservacion($boleto->id);
        }
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
        $reservacionesX =Reservacion::where('cliente_id', '1')->get()->pluck('registro_vuelo_id');
        $registrosVuelos = Registro_Vuelo::whereIn('id',$reservacionesX)->get();
        $colleccion = new Collection();
        foreach($registrosVuelos as $reg){
            $vuelo = Vuelo::where('id',$reg->vuelo)->first();
            $AeropuertoSalida = Aeropuerto::where('id',$vuelo->aeropuertosalida)->first();
            $AeropuertoLlegada = Aeropuerto::where('id',$vuelo->aeropuertodestino)->first();
            $obj = new ObjetoRegistroVuelo();
            $obj->AeropuertoSalida = $AeropuertoSalida;
            $obj->AeropuertoDestino = $AeropuertoLlegada;
            $obj->CantidadBoletos =count(Reservacion::where('cliente_id', '1')->where('registro_vuelo_id',$reg->id)->get());
            $obj->RegistroVuelo = $reg;
            $colleccion->push($obj);
        }
        return view('ReservacionBoleto.VerReservaciones')
        ->with('colleccion', $colleccion);
    }

    public function MetodoListarReservacionesCliente(){
        return Reservacion::where('cliente_id', '1')->get();// En vez de usuario 1 debe ser el usuario logeado
    }

    public function MetodoObtenerReservacion($idReservacion){
        $reservaciones =Reservacion::where('id', $idReservacion)->first();
        return $reservaciones;
    }
}
