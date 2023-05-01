<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuarios extends Model
{
    use HasFactory;
    protected $table="usuario";
    public $timestamps = false;

    protected $fillable = [
        'correo',
        'contasena',
        'estado',
        'fecha_registro',
        'fecha-actulizacion',
        'ultimo_acceso',
        'rol_id',
        'sesion',
        'tiempo_uso'
    ];
}
