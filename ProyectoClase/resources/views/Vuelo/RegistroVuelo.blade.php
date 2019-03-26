@extends('layouts.app')
@section('content')
<!-- Content page -->
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Fecha Salida</th>
      <th scope="col">Hora Salida</th>
      <th scope="col">Fecha Llegada</th>
      <th scope="col">Hora Llegada</th>
      <th scope="col">Vuelo</th>
      <th scope="col">Avion</th>
      <th scope="col">Accion</th>

    </tr>
  </thead>
  <tbody>
  @foreach($reservaciones as $reserv)
  <tr class="table-info">
      <th scope="row">{{$reserv->fechasalida}}</th>
      <td>{{$reserv->horasalida}}</td>
      <th scope="row">{{$reserv->fechallegada}}</th>
      <td>{{$reserv->horallegada}}</td>
    <td>{{ $reserv->vuelo }}</td>
    <td>{{ $reserv->avion }}</td>
    <td>
    <a href="/VerDisponibilidad/{{$reserv->id}}"><button class="btn-warning btn-raised btn-sm"><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i>Verificar Disponibilidad</button></a>
    <a href="/ListarTripulacion/{{$reserv->id}}"><button class="btn-primary btn-raised btn-sm"><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i>Ver tripulacion</button></a>
     </td>
  </tr>
@endforeach
  </tbody>
</table>
@endsection
