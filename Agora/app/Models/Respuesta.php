<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    use HasFactory;

    protected $table = 'respuesta';
    public $timestamp = false;

    protected $fillable = [
        'opciones',
        'respuesta_correcta',
        'pregunta_id'
    ];

    protected $primaryKey = 'id_respuesta';
}
