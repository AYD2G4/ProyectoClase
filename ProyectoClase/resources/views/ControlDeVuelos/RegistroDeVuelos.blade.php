@extends('layouts.app')
@section('content')
<!-- Content page -->
<div class="container-fluid">
    <center>	
		<p class="lead">
			DEFINIR RUTA
		</p>
		<p class="lead">
			Avion:			
		</p>
		<select name="Avion">
			@foreach ($Aviones as $elemento)
				<option value={{$elemento->id}}>{{$elemento->codigo}} // {{$elemento->marca}}</option> 
			@endforeach
		</select>			   
		<hr/>
		<br/>
	</center>
		<p class="lead">
			Aeropuerto Salida: &nbsp; &nbsp; &nbsp;
			<select name="Amigo">
				@foreach ($Aeropuertos as $elemento)
					<option value={{$elemento->id}}>{{$elemento->nombre}}</option> 
				@endforeach
			</select>
		</p>
		<br/>
		<p class="lead">
			Aeropuerto Destino: &nbsp;
			<select name="Amigo">
				@foreach ($Aeropuertos as $elemento)
					<option value={{$elemento->id}}>{{$elemento->nombre}}</option> 
				@endforeach
			</select>
		</p>
		<br/>
		<p class="lead">
			Fecha de salida: &nbsp;
			<input id="FechaSalida" type="date">
			Hora: &nbsp;
			<input id="HoraSalida" type="time">
		</p>
		<br/>
		<p class="lead">
			Fecha de Llegada: &nbsp;
			<input id="FechaSalida" type="date">
			Hora: &nbsp;
			<input id="HoraSalida" type="time">
		</p>

		<br/><br/>
		<div class="button"> 
			<center><button type="submit">Guardar</button></center>
		</div>  

</div>
@endsection