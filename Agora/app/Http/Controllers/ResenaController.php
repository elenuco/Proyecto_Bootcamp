<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Resena;
use App\Models\Estudiante;
use App\Models\Usuario;

class ResenaController extends Controller
{
    public function listar(Request $request)
    {
        $resena = Resena::all();
        $resena = DB::table('resena')
            ->join('estudiante', 'resena.estudiante_id', '=', 'estudiante.id_estudiante')
            ->join('usuario', 'estudiante.usuario_id', '=', 'usuario.id_usuario')
            ->select('resena.id_resena', 'resena.puntuacion', 'resena.comentario', 'resena.fecha_registro', 'resena.estado_resena', 'usuario.nombre', 'usuario.apellido', 'estudiante.nie')
            ->orderBy('resena.id_resena', 'asc')
            ->get();

        for ($i = 0; $i < count($resena); $i++) {
            if ($resena[$i]->estado_resena == 1) {
                $resena[$i]->estado_resena = "activo";
            } else {
                $resena[$i]->estado_resena = "inactivo";
            }
        }
        return response()->json($resena);
    }

    public function obtener(Request $request, $id)
    {

        $resena = DB::table('resena')
            ->where('resena.id_resena', '=', $id)
            ->join('estudiante', 'resena.estudiante_id', '=', 'estudiante.id_estudiante')
            ->join('usuario', 'estudiante.usuario_id', '=', 'usuario.id_usuario')
            ->select('resena.id_resena', 'resena.puntuacion', 'resena.comentario', 'resena.fecha_registro', 'resena.estado_resena', 'usuario.nombre', 'usuario.apellido', 'estudiante.nie');
             $resena = $resena->first();

        if ($resena == null) {
            $mensaje = array(
                'error' => "Reseña no encontrada."
            );
            return response()->json($mensaje, 404);
        }

        if ($resena->estado_resena== 1) {
            $resena->estado_resena= "activa";
        } else {
            $resena->estado_resena= "inactiva";
        }

        return response()->json($resena);
    }



    public function eliminar(Request $request, $id)

    {
        $resena = Resena::where("id_resena", $id)->first();

        if ($resena == null) {
            $mensaje = array(
                "error" => "Reseña no encontrada."
            );

            return response()->json($mensaje, 404);
        }


        $resena->estado_resena = 0;
        $resena->timestamps = false;
        $resena->save();
        $mensaje = array(
            "mensaje" => "La reseña fue borrada exitosamente"
        );

        return response()->json($mensaje);
    }
}
