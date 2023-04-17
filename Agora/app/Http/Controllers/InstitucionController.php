<?php

namespace App\Http\Controllers;

use App\Http\Requests\NuevaInstitucionRequest;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Institucion;
use App\Models\Municipio;
use App\Models\Departamento;

class InstitucionController extends Controller
{
    public function listar(Request $request)
    {
        $institucion = Institucion::all();
        $institucion = DB::table('institucion')
            ->join('municipio', 'institucion.municipio_id', '=', 'municipio.id_municipio')
            ->join('departamento', 'municipio.departamento_id', '=', 'departamento.id_departamento')
            ->select('institucion.id_institucion', 'institucion.nombre_institucion', 'institucion.tipo_institucion', 'institucion.estado_institucion', 'institucion.logo', 'municipio.nombre_municipio AS municipio', 'departamento.nombre_departamento AS departamento')
            ->orderBy('institucion.id_institucion', 'asc')
            ->get();

        for ($i = 0; $i < count($institucion); $i++) {
            if ($institucion[$i]->estado_institucion == 1) {
                $institucion[$i]->estado_institucion = "activa";
            } else {
                $institucion[$i]->estado_institucion = "inactiva";
            }
        }
        return response()->json($institucion);
    }

    public function obtener(Request $request, $id)
    {
        $institucion = DB::table('institucion')
            ->where('institucion.id_institucion', '=', $id)
            ->join('municipio', 'institucion.municipio_id', '=', 'municipio.id_municipio')
            ->join('departamento', 'municipio.departamento_id', '=', 'departamento.id_departamento')
            ->select('institucion.id_institucion', 'institucion.nombre_institucion', 'institucion.tipo_institucion', 'institucion.estado_institucion', 'institucion.logo', 'municipio.nombre_municipio AS municipio', 'departamento.nombre_departamento AS departamento');
        $institucion = $institucion->first();

        if ($institucion == null) {
            $mensaje = array(
                'error' => "Institucion no encontrada."
            );
            return response()->json($mensaje, 404);
        }

        if ($institucion->estado_institucion == 1) {
            $institucion->estado_institucion = "activa";
        } else {
            $institucion->estado_institucion = "inactiva";
        }

        return response()->json($institucion);
    }

    public function insertar(NuevaInstitucionRequest $request)
    {
        $request->validated();

        $municipio = Municipio::where('id_municipio', '=', $request->municipio_id)->first();
        if ($municipio == null) {
            $mensaje = array(
                'mensaje' => "Municipio no encontrado."
            );

            return response()->json($mensaje, 404);
        }

        $datos = array(
            'nombre_institucion' => $request->nombre_institucion,
            'tipo_institucion' => $request->tipo_institucion,
            'estado_institucion' => 1,
            'logo' => $request->logo,
            'municipio_id' => $request->municipio_id,
        );

        $nuevaInstitucion = new Institucion($datos);
        $nuevaInstitucion->save();
        if ($nuevaInstitucion->estado_institucion == 1) {
            $nuevaInstitucion->estado_institucion = "Activo";
        } else {
            $nuevaInstitucion->estado_institucion = "Inactivo";
        }
        return response()->json($nuevaInstitucion);
    }

    public function actualizar(Request $request, $id)
    {
        $institucion = Institucion::where('id_institucion', $id)->first();
        if ($institucion == null) {
            $mensaje = array(
                'error' => "Institucion no encontrada."
            );
            return response()->json($mensaje, 404);
        }

        $municipio = Municipio::where('id_municipio', '=', $request->municipio_id)->first();
        if ($municipio == null) {
            $mensaje = array(
                'mensaje' => "Municipio no encontrado."
            );
            return response()->json($mensaje, 404);
        }

        $institucion->nombre_institucion = $request->nombre_institucion;
        $institucion->tipo_institucion = $request->tipo_institucion;
        $institucion->logo = $request->logo;
        $institucion->municipio_id = $request->municipio_id;
        $institucion->save();

        return response()->json($institucion);
    }

    public function eliminar(Request $request, $id)

    {
        $institucion = Institucion::where("id_institucion", $id)->first();
        if ($institucion == null) {
            $mensaje = array(
                "error" => "Institucion no encontrada."
            );
            return response()->json($mensaje, 404);
        }

        $institucion->estado_institucion = 0;
        $institucion->save();
        $mensaje = array(
            "mensaje" => "La institucion fue borrada exitosamente"
        );
        return response()->json($mensaje);
    }
}
