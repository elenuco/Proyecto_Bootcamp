<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use App\Models\usuarios;

class UsuarioController extends Controller
{
 public function ListaUsuarios(Request $Request)
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
    public function Ingresar_Usuario(Request $Request)
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
}
