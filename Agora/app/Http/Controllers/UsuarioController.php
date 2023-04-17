<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use App\Models\usuarios;

class UsuarioController extends Controller
{
 public function listaUsuarios(Request $Request)
    {
        $usuario= usuarios::select(
        'correo',
        'contrasena',
        'estado',
        'fecha_registro',
        'fecha_actualizacion',
        'ultimo_acceso',
        'rol_id',
        'sesion',
        'tiempo_uso');
    return response()->json($usuario);
    }
    public function obtenerUsuario(Request $Request, $id)
    {
        $usuario= usuarios::where('id', '=', $id)->first();
        return response()->json();
    }
    public function ingresarUsuario(Request $Request)
    {
        $data=array(
            'correo'=>$Request->correo,
            'contrasena'=>$Request->contrasena,
            'estado'=>$Request->estado,
            'fecha_registro'=>$Request->fecha_estado,
            'fecha_actualizacion'=>$Request->fecha_actualizacion,
            'ultimo_acceso'=>$Request->ultimo_acceso,
            'rol_id'=>$Request->rol_id,
            'sesion'=>$Request->sesion,
            'tiempo_uso'=>$Request->tiempo_uso
        );
        $nuevo_usuario= new usuarios($data);
        $nuevo_usuario->save();
        return response()->json($nuevo_usuario);
    }
    public function actualizarUsuario(Request $request,$id)
    {
        $usuario=usuarios::where('id', $id)->first;
        $data=array(
            'correo'=>$request->correo,
            'contrasena'=>$request->contrasena,
            'estado'=>$request->estado,
            'fecha_registro'=>$request->fecha_registro,
            'ultimo_acceso'=>$request->ultimo_acceso,
            'rol_id'=>$request->rol_id,
            'sesion'=>$request->sesion,
            'tiempo_uso'=>$request->tiempo_uso
        );
        $usuario->save();
        return response()->json($usuario);
    }
    public function eliminar(Request $request, $id)
    {
        $usuario= usuarios::where('id', $id)->first();
        if ($usuario==null) {
            $mensaje=array(
                'error'=>"Rol no encontrado"
            );
        }
        $usuario->estado=0;
        $usuario->save();
        return response()->json('usuario eliminado exitosamente');
    }
}
