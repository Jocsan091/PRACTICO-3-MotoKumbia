<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
    // Desactivamos timestamps automáticos (si no los usas)
    public $timestamps = false;

    // Columnas que podemos asignar masivamente
    protected $fillable = [
        'fecha_ingreso',
        'fecha_salida',
        'detalle_reparacion',  // <-- corregido
        'precio',
        'moto_id',
    ];

    /**
     * Relación: una reparación pertenece a una motocicleta.
     */
    public function motorcycle()
    {
        return $this->belongsTo(Motorcycle::class, 'moto_id');
    }
}
