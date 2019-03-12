@extends('layouts.app')
@section('content')
<!-- Content page -->
<div class="container-fluid">
            <left>
				<p class="lead">
					Carrito de Compras
				</p>
                <div align="right">
                @if(count($colleccion) ==0)
                <a href="/ProcesarCompra"><button class="btn-success btn-raised btn-sm" ><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i>PROCESAR COMPRA</button></a>
              @else
              <a href="/ProcesarCompra"><button class="btn-success btn-raised btn-sm"><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i>PROCESAR COMPRA</button></a>
               @endif
                </div>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Aeropuerto Salida</th>
      <th scope="col">F. Salida</th>
      <th scope="col">H. Salida</th>
      <th scope="col">Aeropuerto Destino</th>
      <th scope="col">F. Destino</th>
      <th scope="col">H.Destino</th>
      <th scope="col">Cantidad</th>
    </tr>
  </thead>
  <tbody>

  @foreach($colleccion as $col)
  <tr class="table-info">
      <td>{{$col->AeropuertoSalida->nombre}}</td>
      <td>{{$col->RegistroVuelo->fechasalida}}</td>
      <td> {{$col->RegistroVuelo->horasalida}}</td>
      <td>{{$col->AeropuertoDestino->nombre}}</td>
      <td>{{$col->RegistroVuelo->fechallegada}}</td>
      <td> {{$col->RegistroVuelo->horallegada}}</td>

    <form method="POST" action="/QuitarCarrito/{{$col->RegistroVuelo->id}}">
    {{ csrf_field() }}
        <td>
                <input class="form-control form-control-sm" type="number" min="0" max="{{$col->CantidadBoletos}}" value="0" id="cantidad" name="cantidad">
        </td>
        <td>
        <input class="btn btn-danger btn-sm"  type="submit" name="TIPO" value="Quitar Boletos" >
        </td>
    </form>
  </tr>
@endforeach
  </tbody>
</table>
</center>
</div>
@endsection
