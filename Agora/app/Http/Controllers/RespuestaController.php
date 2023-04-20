<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pregunta;
use App\Models\Respuesta;
use Illuminate\Support\Facades\DB;

class RespuestaController extends Controller
{
    public function listar(Request $request)
    {
        $respuesta=Respuesta::all();
        $respuesta = DB::table('respuesta')
        ->join('pregunta','respuesta.pregunta_id', '=', 'pregunta.id_pregunta')
        ->select('pregunta.pregunta','respuesta.opciones','respuesta.respuesta_correcta','respuesta.estado_respuesta')
        ->orderBy('respuesta.id_respuesta', 'asc')
        ->get();

        for ($i = 0; $i < count($respuesta); $i++) {
            if ($respuesta[$i]->estado_respuesta == 1) {
                $respuesta[$i]->estado_respuesta = "activa";
            } else {
                $respuesta[$i]->estado_respuesta = "inactiva";
            }
        }
        return response()->json($respuesta);
    }
}
