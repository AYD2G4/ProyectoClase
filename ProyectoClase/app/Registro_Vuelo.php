<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registro_Vuelo extends Model
{
    protected $table = 'registro_vuelo';
    
    protected $primaryKey='id';
    
    protected $fillable = [
        'fechasalida', 
        'horasalida',
        'fechallegada',
        'horallegada',
        'vuelo',
        'avion'
    ];

    protected $guarded = [

    ];
}
