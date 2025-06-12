<?php

// app/Models/Motorcycle.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

class Motorcycle extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'nombreMoto',
        'patente',
        'en_taller',
        'customer_id'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}

