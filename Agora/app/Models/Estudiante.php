<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;
    protected $table = 'estudiante';

    public $timestamps = false;

    protected $fillable = [
        'nie',
        'nombre',
        'apellido',
        'fecha_nacimiento',
        'genero',
        'foto',
        'telefono',
        'usuario_id',
        'grado_id',
        'institucion_id'
    ];
}
