<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  DateTime;
use App\Models\Rol;

class RolController extends Controller
{
    public function listarRol(Request $request)
    {
        $rol= Rol::select('id', 'tipo_rol')->get();
        return response()->json($rol);
    }
}
