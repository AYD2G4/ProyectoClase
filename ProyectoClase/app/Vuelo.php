<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vuelo extends Model
{
    protected $table = 'vuelo';
    
    protected $primaryKey='id';
    
    protected $fillable = [
        'aeropuertosalida', 
        'aeropuertodestino'        
    ];

    protected $guarded = [

    ];
}
