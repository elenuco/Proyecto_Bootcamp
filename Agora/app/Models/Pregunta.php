<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    use HasFactory;

    protected $table = 'pregunta';
    public $timestamps = false;

    protected $fillable = [
        'pregunta',
        'puntaje_pregunta',
        'cuestionario_id'
    ];

    protected $primaryKey = 'id_pregunta';

}
