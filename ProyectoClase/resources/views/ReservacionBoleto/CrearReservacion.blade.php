@extends('layouts.app')
@section('content')
<!-- Content page -->
<div class="container-fluid">
            <center>
				<p class="lead">
					 MENU CONFIRMAR RESERVACION
				</p>

				<a href="/estadoAviones"><button class="btn-success btn-raised btn-sm"><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i>GENERAR COMPROBANTE</button></a>
				<a href="/definirRuta"><button class="btn-danger btn-raised btn-sm"><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i>CANCELAR</button></a>
			</center>
</div>
@endsection
