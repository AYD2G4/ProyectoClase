<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetalleCompraAux;
use App\DetalleCompra;
use App\Boleto;
use App\Registro_Vuelo;
use App\Vuelo;
use App\Compra;
use App\ObjetoRegistroVuelo;
use App\Aeropuerto;
use App\Http\Controllers\RegistroVueloController;
use App\Http\Controllers\ReservacionController;
use Illuminate\Support\Collection;
use DB;

class CompraController extends Controller
{
    public function ProcesarCompra()
    {
        $idCliente = 1;

    /*    $compra = new Compra();
        $compra->fechahora = date('Y-m-d H:i:s');
        $compra->cliente_id = $idCliente;
        $compra->save();*/
       // $compra = DB::insertGetId('insert into compra (fechahora, cliente_id) values (?, ?)', [ date('Y-m-d H:i:s'), $idCliente ]);
       $compra = DB::table('compra')->insertGetId(
        [ 'fechahora'=> date('Y-m-d H:i:s'),
        'cliente_id'=> $idCliente  ]
    );
     //   $DetalleCompraAux =DetalleCompraAux::where('cliente_id', $idCliente)->get();
     $DetalleCompraAux=DB::table('detallecompraauxiliar as c')
     ->where('c.cliente_id', '=' , $idCliente)->get();

        foreach($DetalleCompraAux as $detalle){
            /*
            $DetalleCompra = new DetalleCompra();
            $DetalleCompra-> compra_id = $compra;
            $DetalleCompra-> cliente_id =  $detalle-> cliente_id;
            $DetalleCompra->boleto_id = $detalle->boleto_id;
            $DetalleCompra->registro_vuelo_id =  $detalle->registro_vuelo_id;
            $DetalleCompra->vuelo_id =  $detalle->vuelo_id;
            $DetalleCompra->precio = $detalle->precio;
            $DetalleCompra->save();
            */
            $DetalleCompra = DB::table('detallecompra')->insertGetId(
                [
                    'compra_id'=> $compra,
                    'cliente_id'=>  $detalle-> cliente_id  ,
                    'boleto_id'=> $detalle->boleto_id  ,
                    'registro_vuelo_id'=>  $detalle->registro_vuelo_id ,
                    'vuelo_id'=>  $detalle->vuelo_id  ,
                    'precio'=>  $detalle->precio

                    ]
            );
            /*
            $boleto = Boleto::where('id',$detalle->boleto_id)->first();
            $boleto->estado = 2;
            $boleto->save();*/
            $boleto = DB::update('update boletos set estado = 2 where id = ?', [$detalle->boleto_id]);


        }
     //   DetalleCompraAux::where('cliente_id', $idCliente)->delete();
        DB::delete('delete from detallecompraauxiliar where cliente_id = ?', [ $idCliente]);

        return redirect('VerCarrito');

    }
    public function ListarCompras()
    {
       // $compras = Compra::get();
        $compras = DB::table('compra') ->get();
        return view('CompraBoleto.VerCompras')->with('compras', $compras);
    }

    public function ListarDetalleCompra($compra_id)
    {
       // $DetalleCompra =DetalleCompra::where('cliente_id', '1')->where('compra_id',$compra_id)->get()->pluck('registro_vuelo_id');
       $DetalleCompra=DB::table('detallecompra as c')
       ->where('c.cliente_id', '=', 1)
       ->where('c.compra_id', '=', $compra_id)->get()->pluck('registro_vuelo_id');

      //  $registrosVuelos = Registro_Vuelo::whereIn('id',$DetalleCompra)->get();
      $registrosVuelos=DB::table('registro_vuelo as c')
       ->whereIn('c.id', $DetalleCompra)->get();

        $colleccion = new Collection();
        foreach($registrosVuelos as $reg){
           // $vuelo = Vuelo::where('id',$reg->vuelo)->first();
           $vuelo=DB::table('vuelo as c')->where('c.id', '=',$reg->vuelo)->first();

  //          $AeropuertoSalida = Aeropuerto::where('id',$vuelo->aeropuertosalida)->first();
            $AeropuertoSalida=DB::table('aeropuerto as c')->where('c.id', '=', $vuelo->aeropuertosalida)->first();

           // $AeropuertoLlegada = Aeropuerto::where('id',$vuelo->aeropuertodestino)->first();
            $AeropuertoLlegada=DB::table('aeropuerto as c')->where('c.id', '=', $vuelo->aeropuertodestino)->first();

            $obj = new ObjetoRegistroVuelo();
            $obj->AeropuertoSalida = $AeropuertoSalida;
            $obj->AeropuertoDestino = $AeropuertoLlegada;
            $obj->CantidadBoletos =count(
                DB::table('detallecompra as c')
                      ->where('c.cliente_id', '=', 1)
                      ->where('c.registro_vuelo_id', '=', $reg->id)
                      ->where('c.compra_id', '=', $compra_id)
                      ->get()
            /*                DetalleCompra::where('cliente_id', '1')->where('registro_vuelo_id',$reg->id)->where('compra_id',$compra_id)->get()*/
        );
            $obj->RegistroVuelo = $reg;
            $colleccion->push($obj);
        }
        return view('CompraBoleto.DetalleCompra')
        ->with('colleccion', $colleccion)
        ->with('compra_id', $compra_id);
    }

}
