<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;

    protected $table = 'municipio';
    public $timestamps = false;

    protected $fillable = [
        'nombre_municipio',
        'departamento_id'
    ];

    protected $primaryKey = 'id_municipio';

    
}
