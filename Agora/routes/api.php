<?php

use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/rol/listarRol',[RolController::class, 'listarRol']);
Route::get('/rol/obtnerRol/{id}', [RolController::class,'obtenerRol']);
Route::post('/rol/ingresarRol',[RolController::class,'ingresarRol']);
//users routes
Route::get('usuarios/listarUsuario', [UsuarioController::class, 'listaUsuario']);
Route::get('usuarios/obtenerUsuario/{id}',[UsuarioController::class,'obtenerUsuario']);
Route::post('usuarios/ingresarUsuario', [UsuariosController::class,'ingresarUsuario']);
Route::put('usuarios/actualizar/{id}', [UsuarioController::class,'actualizarUsuario']);
Route::delete('usuarios/eliminar/{id}', [UsuarioController::class,'eliminar']);
