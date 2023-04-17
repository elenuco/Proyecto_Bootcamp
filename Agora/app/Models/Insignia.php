<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insignia extends Model
{
    use HasFactory;

    protected $table = 'insignia';

    public $timestamps = false;

    protected $fillable = [
        'nombre_insignia',
        'imagen_insignia',
        'puntaje_max',
        'puntaje_min',
        'estado_insignia'
    ];

    protected $primaryKey='id_insignia';
}
