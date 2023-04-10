<?php

namespace App\Http\Controllers;

use DateTime;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Usuario;
use App\Models\Grado;
use App\Models\Institucion;

class EstudianteController extends Controller
{
    public function listar(Request $request)

    {
        $estudiante =Estudiante::select('id_estudiante', 'nie', 'nombre','apellido','fecha_nacimiento', 'genero', 'foto', 'telefono', 'estado_estudiante','usuario.correo AS correo', 'grado.grado_academico AS grado', 'institucion.nombre_institucion AS institucion')
        ->join('usuario', 'estudiante.usuario_id', '=', 'usuario.id_usuario')
        ->join('grado', 'estudiante.grado_id','=', 'grado.id_grado')
        ->join('institucion', 'estudiante.institucion_id', '=', 'institucion.id_institucion')
        ->where('usuario.estado', '=', 1);  
         $estudiante=$estudiante->get();

        for ($i = 0; $i < count($estudiante); $i++) { 
            if($estudiante[$i]->estado_estudiante == 1) {
                $estudiante[$i]->estado = "activo";
            } else {
                $estudiante[$i]->estado = "inactivo";
            }
        }
        return response()->json($estudiante);

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

