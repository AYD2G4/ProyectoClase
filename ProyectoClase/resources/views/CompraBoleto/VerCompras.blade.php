@extends('layouts.app')
@section('content')
<!-- Content page -->
<div class="container-fluid">
            <left>
				<p class="lead">
					Compras
				</p>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Fecha</th>
      <th scope="col">Ver Detalle</th>
    </tr>
  </thead>
  <tbody>

  @foreach($compras as $compra)
  <tr class="table-info">
      <td>{{$compra->fechahora}}</td>
      <td><a href="/ListarDetalleCompra/{{ $compra->id }}"><button class="btn-warning btn-raised btn-sm" ><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i>Ver Detalle</button></a></td>
  </tr>
@endforeach
  </tbody>
</table>
</center>
</div>
@endsection
