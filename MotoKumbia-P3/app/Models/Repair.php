<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
    protected $fillable = [
        'fecha_ingreso',
        'fecha_salida',
        'detalle_reparacion',
        'precio',
        'moto_id',
    ];
}
