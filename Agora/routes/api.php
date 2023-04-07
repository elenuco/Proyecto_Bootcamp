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


Route::get("/estudiante/listar",[EstudianteController::class, "listar"]);
Route::get("/estudiante/obtener/{id_estudiante}",[EstudianteController::class, "obtener"]);
Route::post("/estudiante/insertar",[EstudianteController::class, "insertar"]);


