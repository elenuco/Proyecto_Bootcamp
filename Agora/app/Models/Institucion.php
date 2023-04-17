<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institucion extends Model
{
    use HasFactory;
    protected $table = 'institucion';

    public $timestamps = false;

    protected $fillable = [
        'nombre_institucion',
        'tipo_institucion',
        'estado_institucion',
        'logo',
        'municipio_id'
    ];

    protected $primaryKey = 'id_institucion';
}
