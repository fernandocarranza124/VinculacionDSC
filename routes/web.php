<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Jefe\ProfesorLoginController;
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
    return view('index');
})->name('index');
Route::get('/catalogo', function () {
    return view('catalogo');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// RUTAS ALUMNO
Route::get('/alumno/index', [App\Http\Controllers\AlumnoController::class, 'index'])->name('alumno.home');

//
//
//
//
//RUTAS PROFESOR
Route::get('profesor/index', [App\Http\Controllers\ProfesorController::class, 'index'])->name('profesor.home');

Route::get('profesor/login', [App\Http\Controllers\AuthProfesor\ProfesorLoginController::class, 'showLoginForm'])->name('Profesor.login');
Route::post('profesor/login', [App\Http\Controllers\AuthProfesor\ProfesorLoginController::class, 'login'])->name('Profesor.login.submit');


// 
// 
// 
// 
// RUTAS JEFE DE OFICINA
Route::get('jefeoficina/index', [App\Http\Controllers\JefeOficinaController::class, 'index'])->name('jefeoficina.home');
Route::get('jefeoficina/vacantes/show', [App\Http\Controllers\JefeOficinaController::class, 'showVacantes'])->name('jefeoficina.vacantes');
Route::get('jefeoficina/vacantes/edit/{id}', [App\Http\Controllers\JefeOficinaController::class, 'editVacante'])->name('jefeoficina.vacante.edit');
Route::post('jefeoficina/vacantes/update/{id}', [App\Http\Controllers\JefeOficinaController::class, 'updateVacante'])->name('jefeoficina.vacante.update');


Route::get('jefeoficina/login', [App\Http\Controllers\AuthJefeOficina\JefeOficinaLoginController::class, 'showLoginForm'])->name('jefeoficina.login');
Route::post('jefeoficina/login', [App\Http\Controllers\AuthJefeOficina\JefeOficinaLoginController::class, 'login'])->name('jefeoficina.login.submit');

//
//
//
//






