<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Nivel_satisfaccion;
use App\Models\Estudiante;

class Nivel_satisfaccionController extends Controller
{
    public function listar(Request $request)
    {
        $nivel = DB::table('nivel_satisfaccion')
            ->where('estado_resena', 1)
            ->join('estudiante', 'nivel_satisfaccion.estudiante_id', '=', 'estudiante.id_estudiante')
            ->select('id_nivel_satisfaccion', 'nivel_calificacion', 'comentario', 'fecha_registro', 'estudiante.nie')
            ->get();

        return response()->json($nivel);
    }
}
