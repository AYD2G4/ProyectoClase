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

			<br/><br/>
			<div class="button"> 
				<center><button type="submit">Guardar</button></center>
			</div>  
		</form>
</div>
@endsection

