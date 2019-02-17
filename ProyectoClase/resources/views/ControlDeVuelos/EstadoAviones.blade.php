@extends('layouts.app')
@section('content')
<div class="container-fluid">
<a href="/ControlDeVuelos"><button class="btn-warning btn-raised btn-sm"><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i>Menu Control de Vuelos</button></a><br>
	<center>	<p class="lead">  ESTADO DE AVIONES </p></center>
	<div class="col-xs-12">
      <div class="table-responsive">
        <table class="table table-hover text-center">
          <thead>
			<tr>
			<th style="width: 5%"> ID </th>
			<th style="width: 5%"> Codigo </th>
			<th style="width: 20%"> Marca </th>
			<th style="width: 5%"> Capacidad </th>
			<th style="width: 10%"> Estado </th>
			</tr>
          </thead>
		  <tbody>
		  @foreach($aviones as $avion)
		  	<tr>
				<td> {{ $avion->id }} </td>
				<td> {{ $avion->codigo }} </td>
				<td> {{ $avion->marca }} </td>
				<td> {{ $avion->capacidad }} </td>
				@if($avion->estado = 0)
					<td>Inactivo</td>
				@else
					<td>Activo</td>
				@endif
			<tr>
		  @endforeach
		  </tbody>
			
		
				
				

</div>
@endsection