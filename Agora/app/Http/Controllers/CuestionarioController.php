<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use DateTime;
use App\Http\Controllers\Controller;
use App\Http\Requests\NuevoCuestionarioRequest;
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

    public function insertar(NuevoCuestionarioRequest $request)
    {
        $request->validated();

        $unidad = Unidad::where('id_unidad', '=', $request->unidad_id)->first();
        if ($unidad == null) {
            $mensaje = array(
                'mensaje' => "Unidad no encontrada."
            );

            return response()->json($mensaje, 404);
        }

        $grado_materia = Grado_materia::where('id_grado_materia', '=', $request->grado_materia_id)->first();
        if ($grado_materia == null) {
            $mensaje = array(
                'mensaje' => "No encontrado."
            );

            return response()->json($mensaje, 404);
        }

        $datos = array(
            'nombre_cuestionario' => $request->nombre_cuestionario,
            'tema' => $request->tema,
            'descripcion' => $request->descripcion,
            'fecha_realizado'=>(new DateTime())->format('Y-m-d H:i:s'),
            'fecha_actualizacion'=>(new DateTime())->format('Y-m-d H:i:s'),
            'estado_cuestionario' => 1,
            'duracion_cuestionario' => $request->duracion_cuestionario,
            'unidad_id'=> $request->unidad_id,
            'grado_materia_id' => $request->grado_materia_id,
        );
        $nuevoCuestionario = new Cuestionario($datos);
        $nuevoCuestionario->save();
        if ($nuevoCuestionario ->estado_cuestionario == 1) {
            $nuevoCuestionario->estado_cuestionario = "Activo";
        } else {
            $nuevoCuestionario ->estado_cuestionario = "Inactivo";
        }
        return response()->json($nuevoCuestionario);
    }

    public function actualizar(NuevoCuestionarioRequest $request, $id)
    {
        $request->validated();

        $cuestionario = Cuestionario::where('id_cuestionario', $id)->first();
        if ($cuestionario == null) {
            $mensaje = array(
                'error' => "Cuestionario no encontrado."
            );
            return response()->json($mensaje, 404);
        }

        $unidad = Unidad::where('id_unidad', '=', $request->unidad_id)->first();
        if ($unidad == null) {
            $mensaje = array(
                'mensaje' => "Unidad no encontrada."
            );
            return response()->json($mensaje, 404);
        }

        $grado_materia = Grado_materia::where('id_grado_materia', '=', $request->grado_materia_id)->first();
        if ($grado_materia == null) {
            $mensaje = array(
                'mensaje' => "No encontrado."
            );
            return response()->json($mensaje, 404);
        }

        $cuestionario->estado_cuestionario = 1;
        

        $cambios=0;

        if($request->nombre_cuestionario != null)
        {
            $cuestionario->nombre_cuestionario = $request->nombre_cuestionario;
            $cambios++;
        }

        if($request->tema != null)
        {
            $cuestionario->tema = $request->tema;
            $cambios++;
        }

        if($request->descripcion != null)
        {
            $cuestionario->descripcion = $request->descripcion;
            $cambios++;
        }

        if($request->duracion_cuestionario != null)
        {
            $cuestionario->duracion_cuestionario = $request->duracion_cuestionario;
            $cambios++;
        }

        if($request->unidad_id != null)
        {
            $cuestionario->unidad_id = $request->unidad_id;
            $cambios++;
        }
       
        if($request->grado_materia_id != null)
        {
            $cuestionario->grado_materia_id = $request->grado_materia_id;
            $cambios++;
        }
       
        if ($cambios>0) {
            $cuestionario->fecha_actualizacion=(new DateTime())->format('Y-m-d H:i:s');
        }

        $cuestionario->save();

        return response()->json($cuestionario);
    }

    public function eliminar(Request $request, $id)

    {
        $cuestionario = Cuestionario::where("id_cuestionario", $id)->first();
        if ($cuestionario == null) {
            $mensaje = array(
                "error" => "Cuestionario no encontrado."
            );
            return response()->json($mensaje, 404);
        }

        $cuestionario->estado_cuestionario = 0;
        $cuestionario->save();
        $mensaje = array(
            "mensaje" => "El cuestionario fue borrado exitosamente"
        );
        return response()->json($mensaje);
    }
}
