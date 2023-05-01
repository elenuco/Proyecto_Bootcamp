<?php
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\InstitucionController;
use App\Http\Controllers\InsigniaController;
use App\Http\Controllers\CuestionarioController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\UnidadController;

use App\Http\Controllers\ResenaController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\PreguntaController;
use App\Http\Controllers\RespuestaController;
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
Route::post("/cuestionario/insertar", [CuestionarioController::class, 'insertar']);
Route::put("/cuestionario/actualizar/{id}", [CuestionarioController::class, 'actualizar']);
Route::delete("/cuestionario/eliminar/{id}", [CuestionarioController::class, 'eliminar']);

//Rutas para controlador Unidad
Route::get("/unidad/listar", [UnidadController::class, 'listar']);
Route::get("/unidad/obtener/{id}", [UnidadController::class, 'obtener']);
Route::post("/unidad/insertar", [UnidadController::class, 'insertar']);
Route::put("/unidad/actualizar/{id}", [UnidadController::class, 'actualizar']);
Route::delete("/unidad/eliminar/{id}", [UnidadController::class, 'eliminar']);

//Ruta para Controlador Resena
Route::get("/resena/listar", [ResenaController::class, 'listar']);
Route::get("/resena/obtener/{id}", [ResenaController::class, 'obtener']);
Route::delete("/resena/eliminar/{id}",[ResenaController::class, "eliminar"]);

//Ruta listar Municipios
Route::get("/municipio/listar", [MunicipioController::class, 'listar']);

//Ruta listar Departamento
Route::get("/departamento/listar", [MunicipioController::class, 'listarDepartamento']);

//Ruta listar rol
Route::get("/rol/listar", [RolController::class, 'listar']);

//Ruta listar pregunta
Route::get("/pregunta/listar", [PreguntaController::class, 'listar']);

//Ruta listar respuesta
Route::get("/respuesta/listar", [RespuestaController::class, 'listar']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
});
Route::get('/rol/listarRol',[RolController::class, 'listarRol']);
Route::get('/rol/obtenerRol/{id}', [RolController::class,'obtenerRol']);
Route::post('/rol/ingresarRol',[RolController::class,'ingresarRol']);
Route::put('rol/actualizarRol/{id}',[RolController::class,'actualizar']);
Route::delete('rol/delete/{id}', [RolController::class,'eliminar']);
Route::get('usuarios/listarUsuario', [UsuarioController::class, 'listaUsuarios']);
Route::get('usuarios/obtenerUsuario/{id}',[UsuarioController::class,'obtenerUsuario']);
Route::post('usuarios/ingresarUsuario', [UsuarioController::class,'ingresarUsuario']);
Route::put('usuarios/actualizar/{id}', [UsuarioController::class,'actualizarUsuario']);
Route::delete('usuarios/eliminar/{id}', [UsuarioController::class,'eliminar']);

