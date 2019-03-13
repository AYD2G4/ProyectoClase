<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetalleCompraAux;
use App\DetalleCompra;
use App\Boleto;
use App\Registro_Vuelo;
use App\Vuelo;
use App\Compra;
use App\ObjetoregistroVuelo;
use App\Aeropuerto;
use App\Http\Controllers\RegistroVueloController;
use App\Http\Controllers\ReservacionController;
use Illuminate\Support\Collection;

class CompraController extends Controller
{
    public function ProcesarCompra()
    {
        $idCliente = 1;
        $compra = new Compra();
        $compra->fechahora = date('Y-m-d H:i:s');
        $compra->cliente_id = $idCliente;
        $compra->save();
        $DetalleCompraAux =DetalleCompraAux::where('cliente_id', $idCliente)->get();
        foreach($DetalleCompraAux as $detalle){
            $DetalleCompra = new DetalleCompra();
            $DetalleCompra-> compra_id = $compra->id;
            $DetalleCompra-> cliente_id =  $detalle-> cliente_id;
            $DetalleCompra->boleto_id = $detalle->boleto_id;
            $boleto = Boleto::where('id',$detalle->boleto_id)->first();
            $boleto->estado = 2;
            $boleto->save();
            $DetalleCompra->registro_vuelo_id =  $detalle->registro_vuelo_id;
            $DetalleCompra->vuelo_id =  $detalle->vuelo_id;
            $DetalleCompra->precio = $detalle->precio;
            $DetalleCompra->save();
        }
        DetalleCompraAux::where('cliente_id', $idCliente)->delete();
        return redirect('VerCarrito');

    }
    public function ListarCompras()
    {
        $compras = Compra::get();
        return view('CompraBoleto.VerCompras')->with('compras', $compras);
    }

    public function ListarDetalleCompra($compra_id)
    {
        $DetalleCompra =DetalleCompra::where('cliente_id', '1')->where('compra_id',$compra_id)->get()->pluck('registro_vuelo_id');
        $registrosVuelos = Registro_Vuelo::whereIn('id',$DetalleCompra)->get();
        $colleccion = new Collection();
        foreach($registrosVuelos as $reg){
            $vuelo = Vuelo::where('id',$reg->vuelo)->first();
            $AeropuertoSalida = Aeropuerto::where('id',$vuelo->aeropuertosalida)->first();
            $AeropuertoLlegada = Aeropuerto::where('id',$vuelo->aeropuertodestino)->first();
            $obj = new ObjetoRegistroVuelo();
            $obj->AeropuertoSalida = $AeropuertoSalida;
            $obj->AeropuertoDestino = $AeropuertoLlegada;
            $obj->CantidadBoletos =count(DetalleCompra::where('cliente_id', '1')->where('registro_vuelo_id',$reg->id)->where('compra_id',$compra_id)->get());
            $obj->RegistroVuelo = $reg;
            $colleccion->push($obj);
        }
        return view('CompraBoleto.DetalleCompra')
        ->with('colleccion', $colleccion)
        ->with('compra_id', $compra_id);
    }

}
