<?php

namespace App\Http\Controllers;

use App\Http\Requests\NuevaUnidadRequest;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Unidad;
use App\Models\Materia;
use App\Models\Grado_materia;
use App\Models\Grado;

class UnidadController extends Controller
{
    public function listar(Request $request)
    {
        $unidad=Unidad::all();
        $unidad = DB::table('unidad')
        ->join('materia', 'unidad.mate_id', '=', 'materia.id_materia')
        ->join('grado_materia', 'materia.id_materia', '=', 'grado_materia.materia_id')
        ->join('grado', 'grado_materia.grade_id', '=', 'grado.id_grado')
        ->select('unidad.numero_unidad AS numero','unidad.nombre_unidad AS nombre', 'grado.grado_academico AS grado', 'materia.nombre_materia AS materia', 'unidad.estado_unidad')
        ->get();

        for ($i = 0; $i < count($unidad); $i++) {
            if ($unidad[$i]->estado_unidad == 1) {
                $unidad[$i]->estado_unidad = "activo";
            } else {
                $unidad[$i]->estado_unidad = "inactivo";
            }
        }
        return response()->json($unidad);

    }

    public function obtener(Request $request, $id)
    {
        $unidad = DB::table('unidad')
        ->where('unidad.id_unidad', '=', $id)
        ->join('materia', 'unidad.mate_id', '=', 'materia.id_materia')
        ->join('grado_materia', 'materia.id_materia', '=', 'grado_materia.materia_id')
        ->join('grado', 'grado_materia.grade_id', '=', 'grado.id_grado')
        ->select('unidad.numero_unidad AS numero','unidad.nombre_unidad AS nombre', 'grado.grado_academico AS grado', 'materia.nombre_materia AS materia', 'unidad.estado_unidad');
        $unidad = $unidad->first();

        if ($unidad == null) {
            $mensaje = array(
                'error' => "Cuestionario no encontrado."
            );
            return response()->json($mensaje, 404);
        }

        if ($unidad->estado_unidad == 1) {
            $unidad->estado_unidad = "activo";
        } else {
            $unidad->estado_unidad = "inactivo";
        }

        return response()->json($unidad);

    }

    public function insertar(NuevaUnidadRequest $request)
    {
        $request->validated();

        $materia = Materia::where('id_materia', '=', $request->mate_id)->first();
        if ($materia == null) {
            $mensaje = array(
                'mensaje' => "Materia no encontrada."
            );

            return response()->json($mensaje, 404);
        }

        $datos = array(
            'numero_unidad' => $request->numero_unidad,
            'nombre_unidad' => $request->nombre_unidad,
            'estado_unidad' => 1,
            'mate_id' => $request->mate_id,
        );
        $nuevaUnidad = new Unidad($datos);
        $nuevaUnidad ->save();
        if ($nuevaUnidad ->estado_unidad == 1) {
            $nuevaUnidad ->estado_unidad = "Activo";
        } else {
            $nuevaUnidad ->estado_unidad = "Inactivo";
        }
        return response()->json($nuevaUnidad);

    }

    public function actualizar (NuevaUnidadRequest $request, $id)
    {
        $request->validated();

        $unidad = Unidad::where('id_unidad', $id)->first();
        if ($unidad == null) {
            $mensaje = array(
                'error' => "Unidad no encontrada."
            );
            return response()->json($mensaje, 404);
        }
    
        $materia = Materia::where('id_materia', '=', $request->mate_id)->first();
        if ($materia == null) {
            $mensaje = array(
                'mensaje' => "Materia no encontrada."
            );
            return response()->json($mensaje, 404);
        }

        $unidad->numero_unidad = $request->numero_unidad;
        $unidad->nombre_unidad = $request->nombre_unidad;
        $unidad->estado_unidad = 1;
        $unidad->mate_id = $request->mate_id;
        $unidad->save();

        return response()->json($unidad);
    }

    public function eliminar(Request $request, $id)

    {
        $unidad = Unidad::where("id_unidad", $id)->first();
        if ($unidad == null) {
            $mensaje = array(
                "error" => "Unidad no encontrada."
            );
            return response()->json($mensaje, 404);
        }

        $unidad->estado_unidad = 0;
        $unidad->save();
        $mensaje = array(
            "mensaje" => "La unidad fue borrada exitosamente"
        );
        return response()->json($mensaje);
    }
}
