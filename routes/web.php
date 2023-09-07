<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("/personas",[PersonaController::class,"Listar"]);
Route::get("/persona/{d}",[PersonaController::class,"Buscar"]);

Route::get("/crear",function () { 
    return view ("crear");
});
Route::post("/crear",[PersonaController::class,"Crear"]);
Route::get("/eliminar/{d}",[PersonaController::class,"Eliminar"]);


