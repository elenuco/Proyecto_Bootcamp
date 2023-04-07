<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuario';

    public $timestamps = false;

    protected $fillable = [
        'correo',
        'contrasena',
        'estado',
        'fecha_registro',
        'fecha:actualizado',
        'inicio_sesion',
        'ultimo_acceso',
        'rol_id',
        'sesion',
        'tiempo_uso'
    ];
}
