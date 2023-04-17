<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;
    protected $table = 'materia';
    public $timestamp = false;

    protected $fillable = [
        'nombre_materia',
        'estado_materia'
    ];

    protected $primaryKey = 'id_materia';

}
