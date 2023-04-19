<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\InstitucionController;
use App\Http\Controllers\InsigniaController;
use App\Http\Controllers\CuestionarioController;
<<<<<<< HEAD
use App\Http\Controllers\UnidadController;

=======
use App\Http\Controllers\ResenaController;
>>>>>>> ffce76764940cd4b8054d72ae45c47e70c4d40c5

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
Route::post("/estudiante/actualizar/{id}",[EstudianteController::class, "actualizar"]);
Route::delete("/estudiante/eliminar/{id}",[EstudianteController::class, "eliminar"]);

//Rutas para el controlador Institucion
Route::get("/institucion/listar",[InstitucionController::class,"listar"]);
Route::get("/institucion/obtener/{id}",[InstitucionController::class,"obtener"]);
Route::post("/institucion/insertar",[InstitucionController::class,"insertar"]);
Route::put("/institucion/actualizar/{id}",[InstitucionController::class,"actualizar"]);
Route::delete("/institucion/eliminar/{id}",[InstitucionController::class, "eliminar"]);

//Rutas para el controlador Insignia
Route::get("/insignia/listar",[InsigniaController::class,"listar"]);
Route::get("/insignia/obtener/{id}",[InsigniaController::class,"obtener"]);
Route::post("/insignia/insertar",[InsigniaController::class,"insertar"]);
Route::post("/insignia/actualizar/{id}",[InsigniaController::class,"actualizar"]);
Route::delete("/insignia/eliminar/{id}",[InsigniaController::class,"eliminar"]);


//Rutas para controlador Cuestionario
Route::get("/cuestionario/listar", [CuestionarioController::class, 'listar']);
Route::get("/cuestionario/obtener/{id}", [CuestionarioController::class, 'obtener']);


<<<<<<< HEAD
//Rutas para controlador Unidad
Route::get("/unidad/listar", [UnidadController::class, 'listar']);
Route::get("/unidad/obtener/{id}", [UnidadController::class, 'obtener']);
Route::post("/unidad/insertar", [UnidadController::class, 'insertar']);
Route::put("/unidad/actualizar/{id}", [UnidadController::class, 'actualizar']);
Route::delete("/unidad/eliminar/{id}", [UnidadController::class, 'eliminar']);
=======
//Ruta para Controlador Resena
Route::get("/resena/listar", [ResenaController::class, 'listar']);
Route::get("/resena/obtener/{id}", [ResenaController::class, 'obtener']);
Route::delete("/resena/eliminar/{id}",[ResenaController::class, "eliminar"]);




>>>>>>> ffce76764940cd4b8054d72ae45c47e70c4d40c5
