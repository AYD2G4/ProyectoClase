@extends('layouts.app')
@section('content')
<!-- Content page -->
<div class="container-fluid">
            <left>
				<p class="lead">
					Detalle Compra {{$compra_id}}
				</p>

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
        <td>
                <input class="form-control form-control-sm" type="number" min="0" value="{{$col->CantidadBoletos}}"  id="cantidad" name="cantidad" disabled>
        </td>
  </tr>
@endforeach
  </tbody>
</table>
</center>
</div>
@endsection
