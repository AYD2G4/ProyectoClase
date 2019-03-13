<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    protected $table = 'paquete';
    
    protected $primaryKey='id';
    
    protected $fillable = [
        'vuelo', 
        'libras',
        'desc',
        'alto',
        'ancho',
        'largo',
        'estado'
    ];

    protected $guarded = [

    ];
}
