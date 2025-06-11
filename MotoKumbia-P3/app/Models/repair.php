<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class repair extends Model
{

    public $timestamps = false;

    
    protected $fillable = [
        'fecha_ingreso',
        'fecha_salida',
        'detalle',
        'precio',
        'moto_id',
    ];

    public function motorcycle()
    {
        return $this->belongsTo(Motorcycle::class, 'moto_id');
    }
}
