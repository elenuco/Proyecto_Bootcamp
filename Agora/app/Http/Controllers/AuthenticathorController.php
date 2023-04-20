<?php

namespace App\Http\Controllers;
use App\Models\usuarios;
use Illuminate\Http\Request;
use DateTime;
use Auth;
use Carbon\Carbon;
//Libreria para formatear texto
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminte\Support\Facades\Storage;
class AuthenticathorController extends Controller
{
    public function registro(Request $request){
        $actual=new DateTime;
        $imagen=$request->file('foto');
        $extension=$imagen->extension();
        $nombreImagen= Str::slug($request->usuario).".".$extension;
    }
}
