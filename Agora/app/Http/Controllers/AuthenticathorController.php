<?php

namespace App\Http\Controllers;
use App\Models\usuarios;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Facades\Auth;
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
        $data=array(
            'usuario'=>$request->usuario,
            'foto_perfil'=>$nombreImagen,
            'correo'=>$request->correo,
            'contrasena'=>bcrypt($request->contrasena),
            'estado'=>1,
            'fecha_creacion'=>$actual,
            'fecha_actualizacion'=>$actual,
        );
        $imagen->stroreAS('fotos-perfil/',$nombreImagen);
        $nuevoUsuario= new usuarios($data);
        $nuevoUsuario->save();
        $mensaje =array(
            'mensaje'=>"Usuario registrado exitosamente."
        );
        return response()->json($mensaje);
    }
    public function iniciarSesion(Request $request){
        $credenciales= request(['correo', 'contrasena']);
        if (Auth::attempt($credenciales)==false) {
            $mensaje= array(
                'mensaje'=>'Verifique sus credenciales'
            );
            return response()->json($mensaje, 401);
        }
        $usuario=$request->user();
        $generarToken=$usuario->CreateToken('user Acces Token');
        $token=$generarToken->token;
        $token->save();
        $respuesta=array(
            'token_acceso'=>$generarToken->accessToken,
            'tipo_token'=>'Bearer',
            'fecha_expiracion'=>$generarToken->token->mnexpires_at
        );
        return response()->json($respuesta);
    }
    public function perfil(Request $request){
        $informacion = $request->usuario();
        return response()->json($informacion);
    }
    public function cerrarSesion(Request $request){
        $informacion= $request->user();
        $informacion->token()->revoke();
        $mensaje=[
            'mensaje'=>'Cierre de sesion exitoso'
        ];
        return response()->json($mensaje);
    }
    public function verFotoPerfil($nombreImagen){
        $ruta =storage_path('app/fotos-perfil'.$nombreImagen);
        if (file_exists($ruta)==false) {
            abort(404);
        }
        $imagen= File::get($ruta);
    $tipo= File::mimeType($ruta);
    $respuesta=Response::make($imagen, 200);
    $respuesta->header("Content-Type", $tipo);
    return $respuesta;
    }

}
