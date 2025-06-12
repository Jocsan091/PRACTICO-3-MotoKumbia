<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    
    protected $fillable = ['name', 'phone'];

    // Relación con motos
    public function motorcycles()
    {
        return $this->hasMany(Motorcycle::class, 'cliente_id');
    }
}
