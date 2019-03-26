<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avion extends Model
{
    protected $table = 'avion';
    
    protected $primaryKey='id';
    
    protected $fillable = [
        'capacidad', 
        'codigo',
        'estado',
        'marca'
    ];

    protected $guarded = [

    ];
}
