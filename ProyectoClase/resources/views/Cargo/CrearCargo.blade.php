@extends('layouts.app')
@section('content')
<div class="jumbotron">
  <h1 class="display-3">CREAR NUEVO CARGO</h1>
  <hr class="my-4">
  <form method="POST" action="/CrearCargo">
  {{ csrf_field() }}
    <div class="form-group">
        <label class="col-form-label col-form-label-lg" for="inputLarge">NOMBRE CARGO</label>
        <input class="form-control form-control-lg" type="text" placeholder="Nombre Cargo" id="nombreCargo" name="nombreCargo">
        <br>
        <p align="right">
            <input class="btn btn-danger btn-lg" type="submit" name="TIPO" value="GUARDAR" >
        </p>
    </div>
    </form>
</div>
@endsection
