@extends('layouts.app')
@section('content')
<!-- Content page -->
<a href="/ControlDeVuelos"><button class="btn-warning btn-raised btn-sm"><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i>Menu Control de Vuelos</button></a><br>
<div class="container-fluid">
    <center>	
		<p class="lead">
			DEFINIR VUELO
		</p>
	</center>
	<form  method="post">
		@csrf
		<p class="lead">
			Aeropuerto Salida: &nbsp; &nbsp; &nbsp;
			<select name="AeropuertoSalida">
				@foreach ($Aeropuertos as $elemento)
					<option value={{$elemento->id}}>{{$elemento->nombre}}</option> 
				@endforeach
			</select>
		</p>
		<br/>
		<p class="lead">
			Aeropuerto Destino: &nbsp;
			<select name="AeropuertoLlegada">
				@foreach ($Aeropuertos as $elemento)
					<option value={{$elemento->id}}>{{$elemento->nombre}}</option> 
				@endforeach
			</select>
		</p>
		<br/><br/>
		<div class="button"> 
			<center><button type="submit">Guardar</button></center>
		</div>  
</form>
	
</div>
@endsection