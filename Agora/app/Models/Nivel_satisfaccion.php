<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nivel_satisfaccion extends Model
{
    use HasFactory;
    protected $table = 'cuestionario';

    public $timestamps = false;

    protected $fillable = [
        'nivel_calificacion',
        'comentario',
        'fecha_registro',
        'estado_resena',
        'estudiante_id',
    ];
}
