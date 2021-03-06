@extends('layouts.app')
@section('content')
<!-- Content page -->
<div class="container-fluid">
            <center>
				<p class="lead">
					 CONFIRMACIÓN DEL PASAJERO
				</p>
                <div class="row">
                    <div class="col-sm-3">
                        <img src="{{URL::asset('/image/p1.jpg')}}" alt="profile Pic" height="200" width="200">
                    </div>
                    <div class="col-sm-7">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>DPI</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{$pasajero->nombre}}</td>
                            <td>{{$pasajero->apellido}}</td>
                            <td>{{$pasajero->dpi}}</td>
                        </tr>
                        </tbody>
                    </table>
                    </div>
                    <div class="col-sm-2">
                        {!! QrCode::size(200)->generate($pasajero->dpi); !!}
                    </div>
                </div>
				<a href="/checkin/buscarpersona"><button class="btn-success btn-raised btn-sm"><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i>AUTORIZAR</button></a>
				<a href="/checkin/buscarpersona"><button class="btn-danger btn-raised btn-sm"><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i>REPORTAR</button></a>
			</center>
</div>
@endsection
