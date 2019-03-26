<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aeropuerto extends Model
{
    protected $table = 'aeropuerto';
    
    protected $primaryKey='id';
    
    protected $fillable = [
        'nombre', 
        'pais',
        'ciudad'
    ];

    protected $guarded = [

    ];
}
