@extends('layouts.app')
@section('content')
<!-- Content page -->
<div class="container-fluid">
            <center>	
				<p class="lead">
					 MENU CONTROL DE VUELOS
				</p>
			
				<a href="/estadoAviones"><button class="btn-warning btn-raised btn-sm"><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i>Ver estado Aviones</button></a><br><br>
				<a href="/definirRuta"><button class="btn-warning btn-raised btn-sm"><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i>Definir Ruta Avion</button></a><br>
			</center>
</div>
@endsection
