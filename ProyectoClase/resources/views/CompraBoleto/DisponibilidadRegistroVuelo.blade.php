@extends('layouts.app')
@section('content')
<div class="jumbotron">
  <h1 class="display-8">VUELO ID: [ {{$infoVuelo->id}} ]</h1>
  <div class="row">
  <div class="col-5">
  <div class="card text-white bg-secondary mb-0" style="max-width: 70rem;">
  <div class="card-header"> {{ $AeropuertoSalida->nombre }}</div>
  <div class="card-body">
  <p class="lead"> Fecha Salida:  {{ $RegistroVuelo->fechasalida  }}</P>
  <p class="lead">  Hora Salida: {{$RegistroVuelo->horasalida}}</p>
  </div>
</div>
</div>

    <div class="col-5">

        <div class="card text-white bg-primary mb-0" style="max-width: 70rem;">
        <div class="card-header"> {{ $AeropuertoDestino->nombre }}</div>
        <div class="card-body">
        <p class="lead"> Fecha Llegada: {{ $RegistroVuelo->fechallegada }} </p>
        <p class="lead"> Hora Llegada:{{$RegistroVuelo->horallegada}}</p>
          </div>
        </div>
    </div>

</div>

    <hr class="my-1">
    <form method="POST" action="/VerDisponibilidad/{{$RegistroVuelo->id}}">
    {{ csrf_field() }}
        <div class="form-group row">
            <label for="example-number-input" class="col-2 col-form-label">Cantidad</label>
            <div class="col-5">
            <input class="form-control form-control-sm" type="number" min="0" max="{{$maxBoletosLibres}}" value="0" id="cantidad" name="cantidad">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-5">
            @if( $maxBoletosLibres ==0  )
            <input class="btn btn-success btn-lg" href="/CrearReservacion/{{$RegistroVuelo->id}}" type="submit" name="TIPO" value="RESERVAR BOLETOS" disabled>
            @else
            <input class="btn btn-success btn-lg" href="/CrearReservacion/{{$RegistroVuelo->id}}" type="submit" name="TIPO" value="RESERVAR BOLETOS" >
            @endif
            </div>
            <div class="col-5">
            @if( $maxBoletosLibres ==0  )
            <input class="btn btn-warning btn-lg" href="/CrearReservacion/{{$RegistroVuelo->id}}" type="submit" name="TIPO" value="AGREGAR A CARRITO" disabled>
            @else
            <input class="btn btn-warning btn-lg" href="/CrearReservacion/{{$RegistroVuelo->id}}" type="submit" name="TIPO" value="AGREGAR A CARRITO">
            @endif
            </div>
        </div>
        </form>

</div>
@endsection

