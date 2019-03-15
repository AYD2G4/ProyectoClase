@extends('layouts.app')
@section('content')
<!-- Content page -->
<a href="/ListarPaquetes"><button class="btn-info btn-raised btn-sm"><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i>Listar Paquetes</button></a><br>
</br>
<div class="jumbotron">

	<div class="container-fluid">
		<form  method="post">
		@csrf
		<center>	
			<h1 class="display-3">DEFINIR RUTA DEL PAQUETE</h1>
		</center>
		<hr/>
		
				<br/>
			
				<p class="lead">
					Vuelo: &nbsp; &nbsp; &nbsp;
					<select name="vuelo" class="form-control">
						@foreach ($Vuelos as $elemento)
							<option value={{$elemento->id}}>{{$elemento->aeropuertosalida}} &nbsp; &nbsp;--> &nbsp; &nbsp; {{$elemento->aeropuertodestino}}</option> 
						@endforeach
					</select>
				</p>

				<br/>
				<br/>
				<div class="row">
					<div class="col-sm-6">
						<p class="lead">Numero de Libras: </p>
						<input class="form-control" id="libras" type="number" name="libras">
					</div>
					<div class="col-sm-6">
						<p class="lead">Descripción de items: </p>
						<input class="form-control" id="desc" name="desc">
					</div>
				</div>
				</br>
				<div class="row">
					<div class="col-sm-4">
					    <p class="lead"> Alto: </p>
						<input class="form-control" id="alto" type="number" name="alto">
					</div>
					<div class="col-sm-4">
						<p class="lead"> Ancho: </p>
						<input class="form-control" id="ancho" type="number" name="ancho">
					</div>
					<div class="col-sm-4">
						<p class="lead"> Largo: </p>
						<input class="form-control" id="largo" type="number" name="largo">
					</div>
				</div>
				<br/><br/>
				<div class="button"> 
					<center><button class="btn btn-success" type="submit">Solicitar envío</button></center>
				</div>  
			</form>
	</div>
</div>	
@endsection