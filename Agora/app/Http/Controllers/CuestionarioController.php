<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cuestionario;
use App\Models\Pregunta;
use App\Models\Respuesta;
use App\Models\Unidad;
use App\Models\Grado_materia;
use App\Models\Grado;

class CuestionarioController extends Controller
{
    public function listar(Request $request)
    {
        $cuestionario=Cuestionario::all();
        $cuestionario = DB::table('cuestionario')
        //->join('pregunta','cuestionario.id_cuestionario', '=', 'pregunta.cuestionario_id')
        //->join('respuesta', 'pregunta.id_pregunta','=', 'respuesta.pregunta_id')
        ->join('unidad', 'cuestionario.unidad_id', '=', 'unidad.id_unidad')
        ->join('grado_materia', 'cuestionario.grado_materia_id', '=', 'grado_materia.id_grado_materia')
        ->join('grado','grado_materia.grade_id', '=', 'grado.id_grado')
        ->select('cuestionario.id_cuestionario', 'cuestionario.nombre_cuestionario', 'cuestionario.tema', 'cuestionario.descripcion', 'cuestionario.fecha_realizado', 'cuestionario.fecha_actualizacion', 'cuestionario.estado_cuestionario', 'cuestionario.duracion_cuestionario', 'unidad.nombre_unidad', 'grado.grado_academico')
        ->orderBy('cuestionario.id_cuestionario', 'asc')
        ->get();

        for ($i = 0; $i < count($cuestionario); $i++) {
            if ($cuestionario[$i]->estado_cuestionario == 1) {
                $cuestionario[$i]->estado_cuestionario = "activo";
            } else {
                $cuestionario[$i]->estado_cuestionario = "inactivo";
            }
        }
        return response()->json($cuestionario);

    }

    public function obtener(Request $request, $id)
    {
        $cuestionario = DB::table('cuestionario')
            ->where('cuestionario.id_cuestionario', '=', $id)
            ->join('unidad', 'cuestionario.unidad_id', '=', 'unidad.id_unidad')
            ->join('grado_materia', 'cuestionario.grado_materia_id', '=', 'grado_materia.id_grado_materia')
            ->join('grado','grado_materia.grade_id', '=', 'grado.id_grado')
            ->select('cuestionario.id_cuestionario', 'cuestionario.nombre_cuestionario', 'cuestionario.tema', 'cuestionario.descripcion', 'cuestionario.fecha_realizado', 'cuestionario.fecha_actualizacion', 'cuestionario.estado_cuestionario', 'cuestionario.duracion_cuestionario', 'unidad.nombre_unidad', 'grado.grado_academico');
            $cuestionario = $cuestionario->first();

            if ($cuestionario == null) {
                $mensaje = array(
                    'error' => "Cuestionario no encontrado."
                );
                return response()->json($mensaje, 404);
            }
    
            if ($cuestionario->estado_cuestionario == 1) {
                $cuestionario->estado_cuestionario = "activo";
            } else {
                $cuestionario->estado_cuestionario = "inactivo";
            }
    
            return response()->json($cuestionario);

    }
}
