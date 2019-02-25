@extends('layouts.app')
@section('content')
<div class="container-fluid">
<a href="/ControlDeVuelos"><button class="btn-warning btn-raised btn-sm"><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i>Menu Control de Vuelos</button></a><br>
	<center>	<p class="lead">  Pago Con Tarjeta </p></center>
	<div class="container-fluid">
	<form  method="post">
	@csrf
	<input id="Nombre" type="text" name="Nombre">
	</form>
	</div>		
		
				
				

</div>
@endsection