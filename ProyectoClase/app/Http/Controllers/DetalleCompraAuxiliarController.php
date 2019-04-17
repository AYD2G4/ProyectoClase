<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\DetalleCompraAux;
use App\Boleto;
use App\Registro_Vuelo;
use App\Vuelo;
use App\ObjetoRegistroVuelo;
use App\Aeropuerto;
use App\Http\Controllers\RegistroVueloController;
use App\Http\Controllers\ReservacionController;
use Illuminate\Support\Collection;


class DetalleCompraAuxiliarController extends Controller
{
    public function AgregarBoleto($boleto_id,$precio){
        $DetalleCompraAux = new DetalleCompraAux();
        $DetalleCompraAux->cliente_id = 1 ;//Hay que cambiarlo por el usuario logueado
        $DetalleCompraAux->boleto_id = $boleto_id;
        $DetalleCompraAux->precio = $precio;
        $boleto = Boleto::where('id',$boleto_id)->first();
        $DetalleCompraAux->vuelo_id = $boleto->vuelo_id;
        $DetalleCompraAux->registro_vuelo_id = $boleto->registro_vuelo_id;
        $DetalleCompraAux->save();
        return $DetalleCompraAux;
    }

    public function QuitarBoletoCarrito($boleto_id){
        $DetalleCompraAux =DetalleCompraAux::where('boleto_id', $boleto_id)->first();
        $DetalleCompraAux->delete();
    }

    public function QuitarCantidadCarrito(Request $request,$registro_vuelo_id){
        $cantidad =  $request->input('cantidad');
        $reservacionesX =DetalleCompraAux::where('cliente_id', '1')->where('registro_vuelo_id',$registro_vuelo_id)->get()->pluck('boleto_id');
        $Boletos = Boleto::whereIn('id',$reservacionesX)->get();
        for($x=0;$x<$cantidad;$x++){
            $boleto = $Boletos[$x];
            $boleto->estado = 0;
            $boleto->save();
            $this->QuitarBoletoCarrito($boleto->id);
        }
        return redirect('VerCarrito');
    }

    public function VerificarDisponibilidadBoletosLibres($registro_vuelo_id, $cantidad){
        $controllerRegistroVuelo = new RegistroVueloController();
        $BoletosLibres = $controllerRegistroVuelo->ObtenerBoletosEstado($registro_vuelo_id,0);
        if($cantidad<=count($BoletosLibres)){
            return true;
        }else{
            return false;
        }
    }

    public function MaxBoletosLibres($registro_vuelo_id){
        $controllerRegistroVuelo = new RegistroVueloController();
        $BoletosLibres = $controllerRegistroVuelo->ObtenerBoletosEstado($registro_vuelo_id,0);
        if($BoletosLibres==null){
            return 0;
        }
        return count($BoletosLibres);
    }

    public function AgregarCantidadBoletos($registro_vuelo_id,$cantidad){
        if($this->VerificarDisponibilidadBoletosLibres($registro_vuelo_id,$cantidad)){
            $controllerRegistroVuelo = new RegistroVueloController();
            $BoletosLibres = $controllerRegistroVuelo->ObtenerBoletosEstado($registro_vuelo_id,0);
            for($x=0;$x<$cantidad;$x++){
                $boleto = $BoletosLibres[$x];
                $boleto->estado = 1;
                $boleto->save();
                $this->AgregarBoleto($boleto->id,50);//Se tiene que arreglar el precio
            }
            return true;
        }else{
            return false;
        }
    }

    public function VerificarDisponibilidad($registro_vuelo_id)
    {
        $RegistroVuelo = Registro_Vuelo::where('id',$registro_vuelo_id)->first();
        $infoVuelo = Vuelo::where('id',$RegistroVuelo->vuelo)->first();
        $AeropuertoSalida = Aeropuerto::where('id',$infoVuelo->aeropuertosalida)->first();
        $AeropuertoDestino=Aeropuerto::where('id',$infoVuelo->aeropuertodestino)->first();
        $maxBoletosLibres = $this->MaxBoletosLibres($registro_vuelo_id);
        return view('CompraBoleto.DisponibilidadRegistroVuelo')
        ->with('maxBoletosLibres',$maxBoletosLibres)
        ->with('infoVuelo',$infoVuelo)
        ->with('RegistroVuelo',$RegistroVuelo)
        ->with('AeropuertoSalida',$AeropuertoSalida)
        ->with('AeropuertoDestino',$AeropuertoDestino);
    }

    public function VerificarDisponibilidad1(Request $request,$idRegistroVuelo)
    {
        $cantidad =  $request->input('cantidad');
        $tipo =  $request->input('TIPO');
        if($tipo=="RESERVAR BOLETOS"){
            $controller = new ReservacionController();
            return $controller->CrearCantidadReservacion($idRegistroVuelo,$cantidad);
        }else{
               return $this->AgregarBoletosView($idRegistroVuelo,$cantidad);
        }
    }

    public function AgregarBoletosView($registro_vuelo_id,$cantidad){
        $this->AgregarCantidadBoletos($registro_vuelo_id,$cantidad);
        return redirect('VerCarrito');
    }

    public function ListarCompras()
    {
        $DetalleCompraAuxX =DetalleCompraAux::where('cliente_id', '1')->get()->pluck('registro_vuelo_id');

        $registrosVuelos = Registro_Vuelo::whereIn('id',$DetalleCompraAuxX)->get();
        $colleccion = new Collection();
        foreach($registrosVuelos as $reg){
            $vuelo = Vuelo::where('id',$reg->vuelo)->first();
            $AeropuertoSalida = Aeropuerto::where('id',$vuelo->aeropuertosalida)->first();
            $AeropuertoLlegada = Aeropuerto::where('id',$vuelo->aeropuertodestino)->first();
            $obj = new ObjetoRegistroVuelo();
            $obj->AeropuertoSalida = $AeropuertoSalida;
            $obj->AeropuertoDestino = $AeropuertoLlegada;
            $obj->CantidadBoletos =count(DetalleCompraAux::where('cliente_id', '1')->where('registro_vuelo_id',$reg->id)->get());
            $obj->RegistroVuelo = $reg;
            $colleccion->push($obj);
        }
        return view('CompraBoleto.VerCarrito')
        ->with('colleccion', $colleccion);
    }

    public function ListarCompras1()
    {
        $cantidad =  $request->input('cantidad');

        return view('CompraBoleto.VerCarrito')
        ->with('colleccion', $colleccion);
    }
}
