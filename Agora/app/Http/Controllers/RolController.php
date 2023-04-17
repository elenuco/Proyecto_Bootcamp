<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  DateTime;
use App\Models\Rol;
<<<<<<< HEAD

=======
>>>>>>> Develop-Elena

class RolController extends Controller
{
    public function listarRol(Request $request)
    {
        $rol= Rol::select('id_rol', 'rol_tipo')->get();
        return response()->json($rol);
    }
    public function obtenerRol(Request $Request, $id_rol)
    {
        $rol= Rol::where('id_rol','=',$id_rol)->first();
        return response()->json($rol);
    }
    public function ingresarRol(Request $request)
    {
        $data= array(
<<<<<<< HEAD
            'tipo_rol'=>$Request->tipo_rol
=======
            'rol_tipo'=>$request->rol_tipo
>>>>>>> Develop-Elena
        );
        // return $data;
        $nuevo_rol= new Rol($data);
        $nuevo_rol->save();
        return response()->json($nuevo_rol);
    }
    public function actualizar(Request $request, $id)
    {
        $rol= Rol::where('id',$id)->first;
        $data= array(
            'tipo_rol'=>$request->tipo_rol
        );
        $rol->save();
        return response()->json($rol);
    }
    public function eliminar(Request $Request, $id)
    {
        $rol= Rol::where('id',$id)->first();
        if ($rol==null) {
            $mensaje=array(
                'error'=>"Rol no encontrado"
            );
        }
        $rol->estado=0;
        $rol->save();
        return response()->json('Usuario eliminado existosa');
    }
}
