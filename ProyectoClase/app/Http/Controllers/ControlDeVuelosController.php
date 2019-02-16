<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControlDeVuelosController extends Controller
{
    public function menu(){
        return view('ControlDeVuelos.ControlDeVuelos');
    }
    public function estadoAviones(){
        return view('ControlDeVuelos.EstadoAviones');
    }
    public function definirRuta(){
        return view('ControlDeVuelos.EstadoAviones');
    }
}
