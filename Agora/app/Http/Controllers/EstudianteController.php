<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use DateTime;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Usuario;
use App\Models\Grado;
use App\Models\Institucion;
use App\Models\Municipio;
use App\Models\Departamento;
//use App\Models\Rol;
use App\Http\Requests\NuevoEstudianteRequest;


class EstudianteController extends Controller
{
    public function listar(Request $request)

    {
        $estudiante = Estudiante::all();
        $estudiante = DB::table('estudiante')
            //->join('rol','usuario.rol','=','rol.id_rol')
            ->join('usuario', 'estudiante.usuario_id', '=', 'usuario.id_usuario')
            ->join('grado', 'estudiante.grado_id', '=', 'grado.id_grado')
            ->join('institucion', 'estudiante.institucion_id', '=', 'institucion.id_institucion')
            ->join('municipio', 'estudiante.munici_id', '=', 'municipio.id_municipio')
            ->join('departamento', 'municipio.departamento_id', '=', 'departamento.id_departamento')
            ->select('estudiante.id_estudiante', 'nie', 'usuario.nombre', 'usuario.apellido', 'estudiante.fecha_nacimiento', 'estudiante.genero', 'estudiante.foto', 'estudiante.telefono', 'estudiante.estado_estudiante', 'usuario.correo AS correo', 'grado.grado_academico AS grado', 'institucion.nombre_institucion AS institucion', 'municipio.nombre_municipio AS municipio', 'departamento.nombre_departamento AS departamento')
            ->orderBy('estudiante.id_estudiante', 'asc')
            ->get();

        for ($i = 0; $i < count($estudiante); $i++) {
            if ($estudiante[$i]->estado_estudiante == 1) {
                $estudiante[$i]->estado_estudiante = "activo";
            } else {
                $estudiante[$i]->estado_estudinate = "inactivo";
            }
        }
        return response()->json($estudiante);
    }


    public function obtener(Request $request, $id)
    {
        $estudiante = DB::table('estudiante')
            ->where('estudiante.id_estudiante', '=', $id)
            ->join('usuario', 'estudiante.usuario_id', '=', 'usuario.id_usuario')
            ->join('grado', 'estudiante.grado_id', '=', 'grado.id_grado')
            ->join('institucion', 'estudiante.institucion_id', '=', 'institucion.id_institucion')
            ->join('municipio', 'estudiante.munici_id', '=', 'municipio.id_municipio')
            ->join('departamento', 'municipio.departamento_id', '=', 'departamento.id_departamento')
            ->select('estudiante.id_estudiante', 'nie', 'usuario.nombre', 'usuario.apellido', 'estudiante.fecha_nacimiento', 'estudiante.genero', 'estudiante.foto', 'estudiante.telefono', 'estudiante.estado_estudiante', 'usuario.correo AS correo', 'grado.grado_academico AS grado', 'institucion.nombre_institucion AS institucion', 'municipio.nombre_municipio AS municipio', 'departamento.nombre_departamento AS departamento');
        $estudiante = $estudiante->first();

        if ($estudiante == null) {
            $mensaje = array(
                'error' => "Estudiante no encontrado."
            );
            return response()->json($mensaje, 404);
        }

        if ($estudiante->estado_estudiante == 1) {
            $estudiante->estado_estudiante = "activo";
        } else {
            $estudiante->estado_estudiante = "inactivo";
        }

        return response()->json($estudiante);
    }


    public function insertar(NuevoEstudianteRequest $request)
    {
        $request->validated();

        $usuario = Usuario::where('id_usuario', '=', $request->usuario_id)->first();
        if ($usuario == null) {
            $mensaje = array(
                'mensaje' => "Usuario no encontrado."
            );

            return response()->json($mensaje, 404);
        }

        $grado = Grado::where('id_grado', '=', $request->grado_id)->first();
        if ($grado == null) {
            $mensaje = array(
                'mensaje' => "Grado no encontrado."
            );

            return response()->json($mensaje, 404);
        }

        $institucion = Institucion::where('id_institucion', '=', $request->institucion_id)->first();
        if ($institucion == null) {
            $mensaje = array(
                'mensaje' => "Institucion no encontrada."
            );

            return response()->json($mensaje, 404);
        }

        $municipio = Municipio::where('id_municipio', '=', $request->munici_id)->first();
        if ($municipio == null) {
            $mensaje = array(
                'mensaje' => "Municipio no encontrado."
            );

            return response()->json($mensaje, 404);
        }

        $datos = array(
            'nie' => $request->nie,
            'fecha_nacimiento' => $request->fecha_nacimiento,        
            'genero' => $request->genero,
            'foto' => $request->foto,
            'telefono' => $request->telefono,
            'estado_estudiante' => 1,
            'usuario_id' => $request->usuario_id,
            'grado_id' => $request->grado_id,
            'institucion_id' => $request->institucion_id,
            'munici_id' => $request->munici_id,
        );

        $nuevoEstudiante = new Estudiante($datos);
        $nuevoEstudiante->save();
        if ($nuevoEstudiante->estado_estudiante == 1) {
            $nuevoEstudiante->estado_estudiante = "Activo";
        } else {
            $nuevoEstudiante->estado_estudiante = "Inactivo";
        }
        return response()->json($nuevoEstudiante);
    }

    public function actualizar(Request $request, $id)
    {
        $estudiante = Estudiante::where("id_estudiante", $id)->first();

        if ($estudiante == null) {
            $mensaje = array(
                'error' => "Estudiante no encontrado."
            );
            return response()->json($mensaje, 404);
        }

        $grado = Grado::where('id_grado', '=', $request->grado_id)->first();
        if ($grado == null) {
            $mensaje = array(
                'mensaje' => "Grado no encontrado."
            );

            return response()->json($mensaje, 404);
        }

        $institucion = Institucion::where('id_institucion', '=', $request->institucion_id)->first();
        if ($institucion == null) {
            $mensaje = array(
                'mensaje' => "Institucion no encontrada."
            );

            return response()->json($mensaje, 404);
        }

        $municipio = Municipio::where('id_municipio', '=', $request->munici_id)->first();
        if ($municipio == null) {
            $mensaje = array(
                'mensaje' => "Municipio no encontrado."
            );

            return response()->json($mensaje, 404);
        }

        $estudiante->nie=$request->nie;
        $estudiante->foto=$request->foto;
        $estudiante->telefono=$request->telefono;
        $estudiante->grado_id=$request->grado_id;
        $estudiante->institucion_id=$request->institucion_id;
        $estudiante->munici_id=$request->munici_id;
        $estudiante->save();

        return response()->json($estudiante);


    }

    public function eliminar(Request $request, $id)

    {
        $estudiante = Estudiante::where("id_estudiante", $id)->first();

        if($estudiante == null){
            $mensaje = array(
                "error"=> "Estudiante no encontrado."
            );

            return response()->json($mensaje, 404);
        }

        $estudiante->estado_estudiante= 0;
        $estudiante->save();
        $mensaje = array(
            "mensaje"=> "El estudiante fue borrado exitosamente"
        );

        return response()->json($mensaje);
    }
    }

