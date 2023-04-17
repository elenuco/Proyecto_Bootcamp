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
        'fecha_nacimiento',
        'genero',
        'foto',
        'telefono',
        'estado_estudiante',
        'estado_estudiante',
        'usuario_id',
        'grado_id',
        'institucion_id',
        'munici_id',
    ];

    protected $primaryKey = 'id_estudiante';

    /*public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }*/
}
