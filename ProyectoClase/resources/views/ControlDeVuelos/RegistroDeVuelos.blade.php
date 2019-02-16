@extends('layouts.app')
@section('content')
<!-- Content page -->
<div class="container-fluid">
	<form  method="post">
	@csrf
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
				Vuelo: &nbsp; &nbsp; &nbsp;
				<select name="Vuelo">
					@foreach ($Vuelos as $elemento)
						<option value={{$elemento->id}}>{{$elemento->aeropuertosalida}} &nbsp; &nbsp;--> &nbsp; &nbsp; {{$elemento->aeropuertodestino}}</option> 
					@endforeach
				</select>
			</p>
			<br/>
			<br/>
			<p class="lead">
				Fecha de salida: &nbsp;
				<input id="FechaSalida" type="date" name="FechaSalida">
				Hora: &nbsp;
				<input id="HoraSalida" type="time" name="HoraSalida">
			</p>
			<br/>
			<p class="lead">
				Fecha de Llegada: &nbsp;
				<input id="FechaLlegada" type="date" name="FechaLlegada">
				Hora: &nbsp;
				<input id="HoraLlegada" type="time" name="HoraLlegada">
			</p>

			<br/><br/>
			<div class="button"> 
				<center><button type="submit">Guardar</button></center>
			</div>  
		</form>
</div>
@endsection