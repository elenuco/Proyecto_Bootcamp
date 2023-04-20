<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Rol;

class RolController extends Controller
{
    public function listar(Request $request)
    {
        
        $rol=Rol::all();
        $rol=DB::table('rol')
        ->select('id_rol','tipo_rol','estado_rol')
        ->orderBy('id_rol', 'asc')
        ->get();

        return response()->json($rol);
        
    
}
}