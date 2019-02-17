@extends('layouts.app')
@section('content')
<!-- Content page -->
<div class="container-fluid">
            <left>
				<p class="lead">
					 Listado de Reservaciones
				</p>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Fecha Creacion</th>
      <th scope="col">Estado</th>
      <th scope="col">Vuelo</th>
      <th scope="col">AeropueroLlegada</th>
    </tr>
  </thead>
  <tbody>
  @foreach($reservaciones as $reserv)
  <tr class="table-info">
      <th scope="row">{{$reserv->id}}</th>
      <td>{{$reserv->fechahora}}</td>
      @if($reserv->estado==0)
        <td>Activo</td>
        @endif
        <td>{{ $reserv->registrovuelo_id }}</td>
    <td>
    <a href="/estadoAviones"><button class="btn-success btn-raised btn-sm"><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i>Ver info Vuelo</button></a>
    <a href="/QuitarReservacion/{{$reserv->id}}"><button class="btn-danger btn-raised btn-sm"><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i>Cancelar</button></a>
	 </td>
  </tr>
@endforeach

  </tbody>
</table>
			</center>
</div>
@endsection
