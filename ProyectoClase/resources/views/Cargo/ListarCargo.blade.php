@extends('layouts.app')
@section('content')
<a href="/CrearCargo"><button class="btn-success btn-raised btn-sm" ><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i>NUEVO CARGO</button></a>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nombre Cargo</th>
      <th> </th>
    </tr>
  </thead>
  <tbody>
    @foreach($colleccion as $collect)
    <tr class="table-primary">
      <th scope="row">{{$collect->id}}</th>
      <td>{{$collect->nombrecargo}}</td>
      <td>
      <a href="/ElminarCargo/{{$collect->id}}"><button class="btn-success btn-raised btn-sm" ><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i>ELIMINAR</button></a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection
