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
});
Route::get('/catalogo', function () {
    return view('catalogo');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/profesor', [App\Http\Controllers\ProfesorController::class, 'index'])->name('profesor.home');

Route::get('profesor/login', [App\Http\Controllers\AuthProfesor\ProfesorLoginController::class, 'showLoginForm'])->name('Profesor.login');
Route::post('profesor/login', [App\Http\Controllers\AuthProfesor\ProfesorLoginController::class, 'login'])->name('Profesor.login.submit');


Route::get('/jefeoficina', [App\Http\Controllers\ProfesorController::class, 'index'])->name('profesor.home');

Route::get('jefeoficina/login', [App\Http\Controllers\AuthJefeOficina\JefeOficinaLoginController::class, 'showLoginForm'])->name('jefeoficina.login');
Route::post('jefeoficina/login', [App\Http\Controllers\AuthJefeOficina\JefeOficinaLoginController::class, 'login'])->name('jefeoficina.login.submit');



