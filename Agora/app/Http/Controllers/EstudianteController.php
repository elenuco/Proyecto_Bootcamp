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

class EstudianteController extends Controller
{
    public function listar(Request $request)

    {
        $estudiante = Estudiante::all();
        $estudiante=DB::table('estudiante')
        ->join('usuario','estudiante.id_estudiante', '=', 'usuario.id_usuario')
        ->join('grado', 'estudiante.grado_id','=', 'grado.id_grado')
        ->join('institucion', 'estudiante.institucion_id', '=', 'institucion.id_institucion')
        ->join('municipio','estudiante.munici_id', '=','municipio.id_municipio')
        ->join('departamento', 'municipio.departamento_id', '=', 'departamento.id_departamento')
        ->select('estudiante.id_estudiante', 'nie', 'usuario.nombre','usuario.apellido','estudiante.fecha_nacimiento', 'estudiante.genero', 'estudiante.foto', 'estudiante.telefono', 'estudiante.estado_estudiante','usuario.correo AS correo', 'grado.grado_academico AS grado', 'institucion.nombre_institucion AS institucion', 'municipio.nombre_municipio AS municipio', 'departamento.nombre_departamento AS departamento')->get();

        for ($i = 0; $i < count($estudiante); $i++) { 
            if($estudiante[$i]->estado_estudiante == 1) {
                $estudiante[$i]->estado_estudiante = "activo";
            } else {
                $estudiante[$i]->estado_estudinate = "inactivo";
            }
        }
        return response()->json($estudiante);
        


        /*$estudiante =Estudiante::select('id_estudiante', 'nie', 'nombre','apellido','fecha_nacimiento', 'genero', 'foto', 'telefono', 'estado_estudiante','usuario.correo AS correo', 'grado.grado_academico AS grado', 'institucion.nombre_institucion AS institucion')
        ->join('usuario', 'estudiante.usuario_id', '=', 'usuario.id_usuario')
        ->join('grado', 'estudiante.grado_id','=', 'grado.id_grado')
        ->join('institucion', 'estudiante.institucion_id', '=', 'institucion.id_institucion')
        ->where('usuario.estado', '=', 1);  
         $estudiante=$estudiante->get();*/

    }


    public function obtener(Request $request, $id_estudiante)
    {
       $estudiante = Estudiante::where('id_estudiante', '=', $id_estudiante)
       ->select('id_estudiante', 'nie', 'nombre','apellido','fecha_nacimiento', 'genero', 'foto', 'telefono','estado_estudainte','usuario.correo AS correo', 'grado.grado_academico AS grado', 'institucion.nombre_institucion AS institucion')
       ->join('usuario', 'estudiante.usuario_id', '=', 'usuario.id_usuario')
       ->join('grado', 'estudiante.grado_id','=', 'grado.id_grado')
       ->join('institucion', 'estudiante.institucion_id', '=', 'institucion.id_institucion');

       $estudiante = $estudiante->first();

       if ($estudiante == null) {
        $mensaje = array(
            'error' => "Estudiante no encontrado."
        );

        return response()->json($mensaje, 404);
    }

    return response()->json($estudiante);
}


public function insertar(Request $request)
{

    $datos = array(
        'nie' => $request->nie,
        'nombre'=> $request->nombre,
        'apellido'=> $request->apellido,
        'fecha_nacimiento'=> $request->fecha_nacimiento,
        'genero'=> $request->genero,
        'foto'=> $request->foto,
        'telefono'=> $request->telefono,
        'estado_estudiante' => $request->estado_estudiante,
        'usuario_id'=> $request->usuario_id,
        'grado_id'=> $request->grado_id,
        'institucion_id'=>$request->institucion_id,
    );

    $nuevoEstudiante = new Estudiante($datos);
    $nuevoEstudiante->save();
    return response()->json($nuevoEstudiante);
}

public function actualizar(Request $request, $id_estudiante)
{
    $estudiante=Estudiante::where("id_estudiante",$id_estudiante)->first();

    if ($estudiante == null) {
        $mensaje = array(
            'error' => "Estudiante no encontrado."
        );

        return response()->json($mensaje, 404);
    }

    
}



}

