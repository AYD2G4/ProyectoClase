@extends('layouts.app')
@section('content')
<div class="container-fluid">
	<center>	<p class="lead">  Pago Con Tarjeta (Credito o Debito) </p></center>
	<div class="container-fluid">
	{{$mensaje}}
		<form  method="post">
			@csrf
			<p class="lead">
				Nombre: 
				@for ($i = 1; $i <= 15; $i++) 
					&nbsp;
				@endfor
				<input id="Nombre" type="text" name="Nombre" required><br>
			</p>
			<p class="lead">
				Apellido:
				@for ($i = 1; $i <= 15; $i++) 
					&nbsp;
				@endfor
				<input id="Nombre" type="text" name="Apellido" required>
			</p>
			<p class="lead">
				Numero de Tarjeta:
				@for ($i = 1; $i <= 3; $i++) 
					&nbsp;
				@endfor
				<input id="Nombre" type="Number" name="Tarjeta" required>
			</p>
			<p class="lead">
				Fecha de vencimiento:
				<input id="Nombre" type="text" name="Fecha" required>
			</p>
			<p class="lead">
				Codigo de Seguridad:
				@for ($i = 1; $i <= 1; $i++) 
					&nbsp;
				@endfor
				<input id="Nombre" type="Number" name="Codigo" required>
			</p>
			<div class="button"> 
				<center><button type="submit">Procesar</button></center>
			</div>  
		</form>
	</div>			
</div>
@endsection