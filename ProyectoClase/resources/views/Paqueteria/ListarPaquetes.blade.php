@extends('layouts.app')
@section('content')
<!-- Content page -->
<a href="/registroDePaquetes"><button class="btn-success btn-raised btn-sm"><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i>Registrar Paquetes</button></a><br>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Estado</th>
      <th scope="col">Vuelo</th>
      <th scope="col">Peso</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Alto</th>
      <th scope="col">Ancho</th>
      <th scope="col">Largo</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
  @foreach($paquetes as $paquete)
  <tr class="table-info">
      <th scope="row">{{$paquete->estado}}</th>
      <th scope="row">{{$paquete->vuelo}}</th>
      <td>{{$paquete->libras}}</td>
      <td>{{$paquete->desc}}</td>
      <td>{{$paquete->alto}}</td>
      <td>{{$paquete->ancho}}</td>
      <td>{{$paquete->largo}}</td>      
    <td>
    <a href="/paquetesaprobar/{{$paquete->id}}"><button class="btn-primary btn-raised btn-sm"><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i>Aprobar</button></a>
    <a href="/paquetescancelar/{{$paquete->id}}"><button class="btn-danger btn-raised btn-sm"><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i>Cancelar</button></a>
    <a href="/paquetesesperar/{{$paquete->id}}"><button class="btn-warning btn-raised btn-sm"><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i>En espera</button></a>
    <a href="/paquetesperdido/{{$paquete->id}}"><button class="btn-success btn-raised btn-sm"><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i>Perdido</button></a>
    <a href="/paqueteseliminar/{{$paquete->id}}"><button class="btn-danger btn-raised btn-sm"><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i>Eliminar</button></a>
    
     </td>
  </tr>
@endforeach
  </tbody>
</table>
@endsection
