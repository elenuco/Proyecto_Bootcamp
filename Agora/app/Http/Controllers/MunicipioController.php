<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Municipio;
use App\Models\Departamento;

class MunicipioController extends Controller
{
    public function listar(Request $request)
    {
        $municipio = Municipio::all();
        $municipio = DB::table('municipio')
            ->join('departamento', 'municipio.departamento_id', '=', 'departamento.id_departamento')
            ->select('municipio.id_municipio','municipio.nombre_municipio','departamento.nombre_departamento')
            ->orderBy('municipio.id_municipio', 'asc')
            ->get();

        return response()->json($municipio);
    }
}
