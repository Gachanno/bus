<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusRoute extends Model
{
    use HasFactory;

    protected $fillable = [
        'bus_number',
        'from',
        'to',
        'departure_time',
        'departure_date',
        'duration',
        'price',
    ];
}
