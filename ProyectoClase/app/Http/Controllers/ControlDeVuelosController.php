<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControlDeVuelosController extends Controller
{
    public function vista(){
        return view('ControlDeVuelos.ControlDeVuelos');
    }
}
