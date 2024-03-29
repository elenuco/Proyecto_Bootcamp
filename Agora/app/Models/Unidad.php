<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    use HasFactory;
    protected $table = 'unidad';
    public $timestamps = false;

    protected $fillable = [
        'numero_unidad',
        'nombre_unidad',
        'estado_unidad',
        'mate_id'
    ];

    protected $primaryKey = 'id_unidad';
}
