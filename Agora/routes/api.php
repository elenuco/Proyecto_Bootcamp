<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EstudianteController;


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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

//Rutas para el controlador Estudiante
Route::get("/estudiante/listar",[EstudianteController::class, "listar"]);
Route::get("/estudiante/obtener/{id}",[EstudianteController::class, "obtener"]);
Route::post("/estudiante/insertar",[EstudianteController::class, "insertar"]);
Route::put("/estudiante/actualizar/{id}",[EstudianteController::class, "actualizar"]);
Route::delete("/estudiante/eliminar/{id}",[EstudianteController::class, "eliminar"]);




