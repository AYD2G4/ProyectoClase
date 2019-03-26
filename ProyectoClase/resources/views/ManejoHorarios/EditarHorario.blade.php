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
		@foreach($Horarios as $elemento)
		<center>	
		<p class="lead">{{ $elemento->avion }}
		</p>
		</center>
		<p class="lead">
				Fecha de salida: &nbsp;
				<input id="FechaSalida" type="date" name="FechaSalida" value="{{ $elemento->fechaS }}">
				Hora: &nbsp;
				<input id="HoraSalida" type="time" name="HoraSalida" value="{{ $elemento->horaS }}">
			</p>
			<br/>
			<p class="lead">
				Fecha de Llegada: &nbsp;
				<input id="FechaLlegada" type="date" name="FechaLlegada" value="{{ $elemento->fechaL }}">
				Hora: &nbsp;
				<input id="HoraLlegada" type="time" name="HoraLlegada" value="{{ $elemento->horaL }}">
			</p>

			<br/><br/>
			<div class="button"> 
				<center><button type="submit">Guardar</button></center>
			</div>  
		@endforeach
		  </tbody>
</div>

		</form>
</div>
@endsection

