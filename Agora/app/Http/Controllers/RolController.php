<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  DateTime;
use App\Models\Rol;
use App\Http\Controllers\ response()->download($pathToFile, $name, $headers);

class RolController extends Controller
{
    public function listarRol(Request $Request)
    {
        $rol= Rol::select('id', 'tipo_rol')->get();
        return response()->json($rol);
    }
    public function obtenerRol(Request $Request, $id)
    {
        $rol= Rol::where('id','=',$id)->first();
        return response()->json($rol);
    }
    public function IngresarRol(Request $Request)
    {
        $data= array(
            'tipo_rol'=>$Request->$tipo_rol
        );
        $nuevo_rol= new Rol($data);
        $nuevo_rol->save();
        return response()->json($nuevo_rol);
    }
    public function actualizar(Request $request, $id)
    {
        $rol= Rol::where('id',$id)->first;
        $data= array(
            'tipo_rol'=>$Request->$tipo_rol
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
    }
}
