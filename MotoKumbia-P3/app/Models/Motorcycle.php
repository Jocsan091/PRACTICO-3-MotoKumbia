<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Motorcycle extends Model
{
    public $timestamps = false;

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
