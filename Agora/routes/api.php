<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\InstitucionController;


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

//Rutas para el controlador Institucion
Route::get("/institucion/listar",[InstitucionController::class,"listar"]);
Route::get("/institucion/obtener/{id}",[InstitucionController::class,"obtener"]);
Route::post("/institucion/insertar",[InstitucionController::class,"insertar"]);
Route::put("/institucion/actualizar/{id}",[InstitucionController::class,"actualizar"]);
Route::delete("/institucion/eliminar/{id}",[InstitucionController::class, "eliminar"]);



