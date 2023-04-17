<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grado_materia extends Model
{
    use HasFactory;

    protected $table = 'grado_materia';
    public $timestamp = false;

    protected $fillable = [
        'grade_id',
        'materia_id',
    ];

    protected $primaryKey = 'id_grado_materia';
}
