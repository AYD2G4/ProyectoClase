@extends('layouts.app')
@section('content')
<!-- Content page -->
<div class="container-fluid">
            <left>
				<p class="lead">
					 Listado de Tripulacion
				</p>
                <a href="/SeleccionarEmpleado/{{$registro_vuelo_id}}/1"><button class="btn-success btn-raised btn-sm"><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i>AGREGAR PILOTO</button></a>
				<a href="/SeleccionarEmpleado/{{$registro_vuelo_id}}/2"><button class="btn-danger btn-raised btn-sm"><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i>AGREGAR AZAFATA</button></a>
				<a href="/SeleccionarEmpleado/{{$registro_vuelo_id}}/3"><button class="btn-warning btn-raised btn-sm"><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i>AGREGAR INGENIERO DE NAVEGACION</button></a>
		</left>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Cargo</th>
      <th scope="col">Dpi</th>
      <th scope="col">Telefono</th>
      <th scope="col">F. Nac</th>
    </tr>
  </thead>
  <tbody>
  @foreach($colleccion as $collect)
    <tr class="table-primary">
    <td>{{$collect->Empleado->nombre}}</td>
      <td>{{$collect->Cargo->nombrecargo}}</td>
      <td>{{$collect->Empleado->telefono}}</td>
      <td>{{$collect->Empleado->dpi}}</td>
      <td>{{$collect->Empleado->fechanac}}</td>
      <td>
      <a href="/QuitarTripulante/{{ $registro_vuelo_id }}/{{ $collect->Tripulante->id }}"><button class="btn-success btn-raised btn-sm" ><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i>Quitar Tripulante</button></a>
      </td>
    </tr>
    @endforeach

  </tbody>
</table>
</center>
</div>
@endsection
