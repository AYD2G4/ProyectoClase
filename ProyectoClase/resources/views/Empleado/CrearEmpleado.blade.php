@extends('layouts.app')
@section('content')
<div class="jumbotron">
  <h1 class="display-3">CREAR NUEVO EMPLEADO</h1>
  <hr class="my-4">
  <form method="POST" action="/CrearEmpleado">
  {{ csrf_field() }}
    <div class="form-group">
        <label class="col-form-label" for="inputDefault">Nombre</label>
        <input type="text" class="form-control" placeholder="Nombre" id="Nombre" name="Nombre">
    </div>
    <div class="form-group">
        <label class="col-form-label" for="inputDefault">Telefono</label>
        <input type="number" class="form-control" placeholder="Telefono" id="Telefono" name="Telefono">
    </div>
    <div class="form-group">
        <label class="col-form-label" for="inputDefault">Dpi</label>
        <input type="text" class="form-control" placeholder="Dpi" id="Dpi" name="Dpi">
    </div>
    <div class="form-group">
        <label class="col-form-label" for="inputDefault">Telefono Emergencia</label>
        <input type="number" class="form-control" placeholder="Telefono Emergencia" id="TelefonoEmergencia" name="TelefonoEmergencia">
    </div>
    <div class="form-group">
        <label class="col-form-label" for="inputDefault">Fecha Nac</label>
        <input type="date" class="form-control" placeholder="Fecha Nacimiento" id="FechaNac" name="FechaNac">
    </div>
    <p align="right">
            <input class="btn btn-danger btn-lg" type="submit" name="TIPO" value="GUARDAR" >
        </p>
    </form>
</div>
@endsection
