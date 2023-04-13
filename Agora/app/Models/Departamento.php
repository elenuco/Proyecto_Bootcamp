<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $table = "departamento";
    public $timestamp = false;
    protected $fillable = [
        'nombre_departamento',
    ];

    protected $primaryKey= 'id_departamento';
}