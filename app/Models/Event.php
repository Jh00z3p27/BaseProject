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
        'descripcion',
    ];

    protected $casts = [
        'fecha' => 'date',
    ];
}
