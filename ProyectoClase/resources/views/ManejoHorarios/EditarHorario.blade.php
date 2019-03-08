@extends('layouts.app')
@section('content')
<!-- Content page -->
<a href="/ControlDeVuelos"><button class="btn-warning btn-raised btn-sm"><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i>Menu Control de Vuelos</button></a><br>
<div class="container-fluid">
	<form  method="post">
	@csrf
    <center>	
		<p class="lead">
		MANEJO DE HORARIOS
		</p>
		</center>
		<div class="col-xs-12">
      <div class="table-responsive">
        <table class="table table-hover text-center">
          <thead>
						<tr>
						<th style="width: 10%"> Avion </th>
						<th style="width: 10%"> Fecha Salida </th>
						<th style="width: 10%"> Hora Salida </th>
						<th style="width: 10%"> Fecha Llegada </th>
						<th style="width: 10%"> Hora Llegada </th>
						<th style="width: 10%"> Opciones </th>
						</tr>
          </thead>
				<tbody>
				@foreach($Horarios as $elemento)
					<tr>
					<td> {{ $elemento->fechaS }} </td>
					<td> {{ $elemento->horaS }} </td>
					<td> {{ $elemento->fechaL }} </td>
					<td> {{ $elemento->horaL }} </td>
				<tr>
				@endforeach
		  </tbody>
</div>

		</form>
</div>
@endsection

