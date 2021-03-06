@extends('layouts.app')
@section('content')
<div class="container-fluid">

<p class="lead">
    LISTA EMPLEADOS
</p>

<a href="/CrearEmpleado"><button class="btn-success btn-raised btn-sm" ><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i>NUEVO EMPLEADO</button></a>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Telefono</th>
      <th scope="col">Dpi</th>
      <th scope="col">Fecha Nacimiento</th>
      <th> </th>
    </tr>
  </thead>
  <tbody>
    @foreach($colleccion as $collect)
    <tr class="table-primary">
      <th scope="row">{{$collect->id}}</th>
      <td>{{$collect->nombre}}</td>
      <td>{{$collect->telefono}}</td>
      <td>{{$collect->dpi}}</td>
      <td>{{$collect->fechanac}}</td>
      <td>
      <a href="/EliminarEmpleado/{{$collect->id}}"><button class="btn-success btn-raised btn-sm" ><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i>ELIMINAR</button></a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection
