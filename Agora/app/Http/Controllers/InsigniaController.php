<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Insignia;
use App\Http\Requests\NuevaInsigniaRequest;

class InsigniaController extends Controller
{
    public function listar(Request $request)
    {
        $insignia = Insignia::all();
        $insignia = DB::table('insignia')
            ->select('id_insignia', 'nombre_insignia AS nombre', 'imagen_insignia AS imagen', 'puntaje_max AS puntaje_maximo', 'puntaje_min AS puntaje_minimo', 'estado_insignia')
            ->orderBy('id_insignia', 'asc')
            ->get();

        for ($i = 0; $i < count($insignia); $i++) {
            if ($insignia[$i]->estado_insignia == 1) {
                $insignia[$i]->estado_insignia = "activa";
            } else {
                $insignia[$i]->estado_insignia = "inactiva";
            }
        }
        return response()->json($insignia);
    }

    public function obtener(Request $request, $id)
    {

        $insignia = DB::table('insignia')
            ->where('id_insignia', '=', $id)
            ->select('id_insignia', 'nombre_insignia AS nombre', 'imagen_insignia AS imagen', 'puntaje_max AS puntaje_maximo', 'puntaje_min AS puntaje_minimo', 'estado_insignia');
        $insignia = $insignia->first();

        if ($insignia == null) {
            $mensaje = array(
                'error' => "Insignia no encontrada."
            );
            return response()->json($mensaje, 404);
        }

        if ($insignia->estado_insignia == 1) {
            $insignia->estado_insignia = "activa";
        } else {
            $insignia->estado_insignia = "inactiva";
        }

        return response()->json($insignia);
    }

    public function insertar(NuevaInsigniaRequest $request)
    {
        $request->validated();

        $datos = array(
            'nombre_insignia' => $request->nombre_insignia,
            'imagen_insignia' => $request->imagen_insignia,
            'puntaje_max' => $request->puntaje_max,
            'puntaje_min' => $request->puntaje_min,
            'estado_insignia' => 1,
        );

        $nuevaInsignia = new Insignia($datos);
        $nuevaInsignia->save();
        if ($nuevaInsignia->estado_insignia == 1) {
            $nuevaInsignia->estado_insignia = "Activo";
        } else {
            $nuevaInsignia->estado_insignia = "Inactivo";
        }
        return response()->json($nuevaInsignia);
    }

    public function actualizar(Request $request, $id)
    {
        $insignia = Insignia::where('id_insignia', $id)->first();
        if ($insignia == null) {
            $mensaje = array(
                'error' => "Insignia no encontrada."
            );
            return response()->json($mensaje, 404);
        }

        $insignia->nombre_insignia = $request->nombre_insignia;
        $insignia->imagen_insignia = $request->imagen_insignia;
        $insignia->puntaje_max = $request->puntaje_max;
        $insignia->puntaje_min = $request->puntaje_min;
        $insignia->save();
        return response()->json($insignia);
    }


    public function eliminar(Request $request, $id)

    {
        $insignia = Insignia::where("id_insignia", $id)->first();
        if ($insignia == null) {
            $mensaje = array(
                "error" => "Insignia no encontrada."
            );
            return response()->json($mensaje, 404);
        }

        $insignia->estado_insignia = 0;
        $insignia->save();
        $mensaje = array(
            "mensaje" => "La insignia fue borrada exitosamente"
        );
        return response()->json($mensaje);
    }
}
