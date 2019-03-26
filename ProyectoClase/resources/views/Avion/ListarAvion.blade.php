@extends('layouts.app')
@section('content')
<div class="container-fluid">

<p class="lead">
    Lista Avion
</p>

<a href="/CrearAvion"><button class="btn-success btn-raised btn-sm" ><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i>NUEVO AVION</button></a>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Marca</th>
      <th scope="col">Codigo</th>
      <th scope="col">Capacidad</th>
      <th scope="col">Estado</th>
      <th> </th>
    </tr>
  </thead>
  <tbody>
    @foreach($colleccion as $collect)
    <tr class="table-primary">
      <th scope="row">{{$collect->id}}</th>
      <td>{{$collect->marca}}</td>
      <td>{{$collect->codigo}}</td>
      <td>{{$collect->capacidad}}</td>
      <td>{{$collect->estado}}</td>
      <td>
      <a href="/EliminarAvion/{{$collect->id}}"><button class="btn-success btn-raised btn-sm" ><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i>ELIMINAR</button></a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection
