<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    use HasFactory;

    protected $table = 'grado';

    public $timestamps = false;

    protected $fillable = [
        'grado_academico',
        'nivel_academico'
    ];
}
