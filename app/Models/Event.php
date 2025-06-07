<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'nombre_evento',
        'fecha',
        'lugar',
        'descripción',
    ];

    protected $casts = [
        'fecha' => 'date',
    ];
}
