<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuestionario extends Model
{
    use HasFactory;
    protected $table = "cuestionario";
    public $timestamps = false;
    
    protected $fillable = [
        'nombre_cuestionario',
        'tema',
        'descripcion',
        'fecha_realizado',
        'fecha_actualizacion',
        'estado_cuestionario',
        'duracion_cuestionario',
        'unidad_id',
        'grado_materia_id',
    ];

    protected $primaryKey = 'id_cuestionario';
}
