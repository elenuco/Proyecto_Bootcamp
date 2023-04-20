<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pregunta;
use App\Models\Cuestionario;
use App\Models\Respuesta;
use Illuminate\Support\Facades\DB;

class PreguntaController extends Controller
{
    public function listar(Request $request)
    {
        $pregunta=Pregunta::all();
        $pregunta = DB::table('pregunta')
        ->join('cuestionario','pregunta.cuestionario_id', '=', 'cuestionario.id_cuestionario')
        ->join('respuesta', 'pregunta.id_pregunta','=', 'respuesta.pregunta_id')
        ->select('cuestionario.nombre_cuestionario','pregunta.pregunta','pregunta.puntaje_pregunta','pregunta.estado_pregunta','respuesta.opciones','respuesta.respuesta_correcta')
        ->orderBy('cuestionario.id_cuestionario', 'asc')
        ->get();

        for ($i = 0; $i < count($pregunta); $i++) {
            if ($pregunta[$i]->estado_pregunta == 1) {
                $pregunta[$i]->estado_pregunta = "activa";
            } else {
                $pregunta[$i]->estado_pregunta = "inactiva";
            }
        }
        return response()->json($pregunta);
    }
}
