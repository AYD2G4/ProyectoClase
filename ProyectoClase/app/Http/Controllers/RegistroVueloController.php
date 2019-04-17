<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registro_Vuelo;
use App\Boleto;
use App\Reservacion;
use App\DetalleCompraAux;
use App\Vuelo;
use App\Aeropuerto;
use App\Http\Controllers\RegistroVueloController;
use App\Http\Controllers\DetalleCompraAuxiliarController;
use DB;

class RegistroVueloController extends Controller
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
    public function ListarRegistroVuelo()
    {
      //  $reservaciones = Registro_Vuelo::get();
          $reservaciones = DB::table('registro_vuelo') ->get();
      return view('Vuelo.RegistroVuelo')->with('reservaciones', $reservaciones);
    }

    public function DisponibilidadRegistroVuelo()
    {
      //  $reservaciones = Registro_Vuelo::get();
        $reservaciones = DB::table('registro_vuelo') ->get();
        return view('Vuelo.RegistroVuelo')->with('BoletosRestantes', $reservaciones);
    }

    public function CrearBoleto($registro_vuelo_id){
       /* $boleto = new Boleto();
        $boleto->estado = 0;
        $registroVuelo = Registro_Vuelo::where('id',$registro_vuelo_id)->first();
        $boleto->vuelo_id  = $registroVuelo->vuelo;
        $boleto->registro_vuelo_id = $registro_vuelo_id;
        $boleto->save();*/

     $registroVuelo=DB::table('registro_vuelo as c')
     ->where('c.id', '=' , $registro_vuelo_id)->first();

        $boleto = DB::table('boletos')->insertGetId(
            [ 'estado'=> 0,
            'vuelo_id' => $registroVuelo->vuelo,
            'registro_vuelo_id' =>  $registro_vuelo_id ]
        );
        return $boleto;
    }
    public function ObtenerBoleto($idBoleto){
      //  $boleto =Boleto::where('id', $idBoleto)->first();
      $boleto = DB::table('boletos')
      ->where('c.id', '=', $idBoleto)->first();
        return $boleto;
    }
    public function EditarEstadoBoleto($idBoleto,$estado){
        $boleto =Boleto::where('id', $idBoleto)->first();
        $boleto->estado  = $estado;
        $boleto->save();

        return $boleto;
    }

    public function EliminarBoleto($idBoleto){
        $boleto =Boleto::where('id', $idBoleto)->first();
        $boleto->delete();
    }

    public function GenerarBoletosAvion($registro_vuelo_id, $cantidad){
        for ($x = 0; $x < $cantidad; $x++) {
            $this->CrearBoleto($registro_vuelo_id);
        }
    }

    public function ObtenerBoletoRegistroVuelo($registro_vuelo_id){
        return Boleto::where('registro_vuelo_id', $registro_vuelo_id)->get();
    }

    public function ObtenerBoletosEstado($registro_vuelo_id,$estado){
        return Boleto::where('registro_vuelo_id', $registro_vuelo_id)->where('estado', $estado)->get();
    }

}
