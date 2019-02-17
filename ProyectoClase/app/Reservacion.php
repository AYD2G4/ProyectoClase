<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservacion extends Model
{
    protected $table = 'reservacion';

    protected $primaryKey='id';

    protected $fillable = [
        'fechahora',
        'estado',
        'cliente_id',
        'registrovuelo_id'
    ];

    protected $guarded = [

    ];
}
