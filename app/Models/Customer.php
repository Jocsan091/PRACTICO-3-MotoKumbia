<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    // Asegúrate de que estos campos coincidan con los de tu base de datos
    protected $fillable = ['name', 'email', 'phone'];

    // Relación con motos
    public function motorcycles()
    {
        return $this->hasMany(Motorcycle::class, 'cliente_id');
    }
}
