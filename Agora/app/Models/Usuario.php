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
        'nombre',
        'apellido',
        'correo',
        'password',
        'estado_usuario',
        'fecha_registro',
        'fecha:actualizacion',
        'inicio_sesion',
        'ultimo_acceso',
        'tiempo_uso',
        'rol_id',
        
    ];

    protected $primaryKey = 'id_usuario';
}
