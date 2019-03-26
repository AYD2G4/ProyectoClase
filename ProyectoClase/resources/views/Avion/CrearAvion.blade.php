@extends('layouts.app')
@section('content')
<div class="jumbotron">
  <h1 class="display-3">CREAR NUEVO AVION</h1>
  <hr class="my-4">
  <form method="POST" action="/CrearAvion">
  {{ csrf_field() }}
    <div class="form-group">
        <label class="col-form-label" for="inputDefault">Capacidad</label>
        <input type="number" class="form-control" placeholder="Capacidad" id="Capacidad" name="Capacidad">
    </div>
    <div class="form-group">
        <label class="col-form-label" for="inputDefault">Codigo</label>
        <input type="text" class="form-control" placeholder="Codigo" id="Codigo" name="Codigo">
    </div>
    <div class="form-group">
        <label class="col-form-label" for="inputDefault">Estado [0->Inactivo, 1->Activo]</label>
        <input type="number" min="0" max="1" value="0" class="form-control" placeholder="Estado" id="Estado" name="Estado">
    </div>
    <div class="form-group">
        <label class="col-form-label" for="inputDefault">Marca</label>
        <input type="text" class="form-control" placeholder="Marca" id="Marca" name="Marca">
    </div>
    <p align="right">
            <input class="btn btn-danger btn-lg" type="submit" name="TIPO" value="GUARDAR" >
        </p>
    </form>
</div>
@endsection
