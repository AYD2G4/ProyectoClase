<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ObjetoRegistroVuelo extends Model
{
    protected $AeropuertoSalida;
    protected $AeropuertoDestino;
    protected $RegistroVuelo;
    protected $CantidadBoletos;
}
