<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Calendario extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'descripcio',
        'medico',
        'rut_cliente',
        'nombre_cliente',
        'email',
        'fono',
        'start',
        'end'
    ];
}
