<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';
    
    protected $primaryKey='id';
    
    protected $fillable = [
        'id', 
        'nombre',
        'apellido',
        'dpi'
    ];

    protected $guarded = [

    ];
}
