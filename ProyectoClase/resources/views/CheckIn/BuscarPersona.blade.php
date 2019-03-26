@extends('layouts.app')
@section('content')
<!-- Content page -->
<div class="container-fluid">
            <center>
				<p class="lead">
					 BÚSQUEDA DEL PASAJERO
				</p>
                    
                    
						<form class="navbar-form navbar-left" role="search" method="GET" action="{{ route('buscarPasajero') }}">
							<div class="form-group">
								<input type="text" class="form-control" name = "searchText" placeholder="Buscar...." value = "{{$searchText}}">
							</div>
							<button type="submit" class="btn btn-default">BUSCAR</button>
						</form>
					

        			<div class="table-responsive">
						<table class="table table-hover text-center">
							<thead>
								<tr>		
                                    <th>Imagen</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>DPI</th>
								</tr>
							</thead>
					    	<tbody>		
                            @if (count($pasajeros) > 0)
								@foreach ($pasajeros as $pasajero)								
                                <tr>
                                    <td>
                                        <img src="{{URL::asset('/image/p1.jpg')}}" alt="profile Pic" height="200" width="200">
                                    </td>
                                    <td>{{$pasajero->nombre}}</td>
                                    <td>{{$pasajero->apellido}}</td>
                                    <td>{{$pasajero->dpi}}</td>
									<td>
                                        <a href="verificar/{{$pasajero->id}}"><button class="btn-success btn-raised btn-sm"><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i>SIGUIENTE</button></a>
                                    </td>
								</tr>
								@endforeach
                            @endif
							</tbody>
						</table>
					</div>
		    </center>
</div>
@endsection
