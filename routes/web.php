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



Auth::routes();

Route::get('/home', function () {
    return redirect()->route('alumno.home');
})->name('home');


// RUTAS ALUMNO
Route::get('alumno/index', [App\Http\Controllers\AlumnoController::class, 'index'])->name('alumno.home');
Route::get('alumno/vacantes/show', [App\Http\Controllers\AlumnoController::class, 'showVacantes'])->name('alumno.vacantes');
Route::get('alumno/solicitudes/residencias-profesionales' , [App\Http\Controllers\AlumnoController::class, 'solicitaResidenciasProfesionales'])->name('alumno.solicitudRP');

Route::post('alumno/solicitudes/residencias-profesionales' , [App\Http\Controllers\AlumnoController::class, 'storeSolicitud'])->name('alumno.storeSolicitudRP');
Route::get('alumno/residencias-profesionales', [App\Http\Controllers\AlumnoController::class, 'showExpediente'])->name('alumno.showExpediente');
Route::post('alumno/expediente/comentar', [App\Http\Controllers\AlumnoController::class, 'agregarComentario'])->name('alumno.expediente.comentar');
Route::post('alumno/expediente/agregarCarpeta', [App\Http\Controllers\AlumnoController::class, 'agregarCarpeta'])->name('alumno.expediente.carpeta');
Route::post('alumno/expediente/SubirArchivo', [App\Http\Controllers\AlumnoController::class, 'subirArchivo'])->name('alumno.expediente.documento.subir');
//
//
//
//
//RUTAS PROFESOR
Route::get('profesor/index', [App\Http\Controllers\ProfesorController::class, 'index'])->name('profesor.home');

Route::get('profesor/login', [App\Http\Controllers\AuthProfesor\ProfesorLoginController::class, 'showLoginForm'])->name('Profesor.login');
Route::post('profesor/login', [App\Http\Controllers\AuthProfesor\ProfesorLoginController::class, 'login'])->name('Profesor.login.submit');
Route::get('profesor/residencias-profesionales',[App\Http\Controllers\ProfesorController::class, 'consultaResidentes'])->name('profesor.consulta.residentes');
Route::get('profesor/expedientes/ver/{idExpediente}', [App\Http\Controllers\ProfesorController::class, 'editExpediente'])->name('profesor.expedientes.edit');
Route::post('profesor/expedientes/comentar', [App\Http\Controllers\ProfesorController::class, 'agregarComentario'])->name('profesor.expediente.comentar');

// 
// 
// 
// 
// RUTAS JEFE DE OFICINA
Route::get('jefeoficina/index', [App\Http\Controllers\JefeOficinaController::class, 'index'])->name('jefeoficina.home');
Route::get('jefeoficina/vacantes/show', [App\Http\Controllers\JefeOficinaController::class, 'showVacantes'])->name('jefeoficina.vacantes');
Route::get('jefeoficina/vacantes/create', [App\Http\Controllers\JefeOficinaController::class, 'createVacante'])->name('jefeoficina.vacante.create');
Route::post('jefeoficina/vacantes/store', [App\Http\Controllers\JefeOficinaController::class, 'storeVacante'])->name('jefeoficina.vacante.store');
Route::get('jefeoficina/vacantes/edit/{id}', [App\Http\Controllers\JefeOficinaController::class, 'editVacante'])->name('jefeoficina.vacante.edit');
Route::get('jefeoficina/vacantes/delete/{id}', [App\Http\Controllers\JefeOficinaController::class, 'deleteVacante'])->name('jefeoficina.vacante.delete');
Route::post('jefeoficina/vacantes/update/{id}', [App\Http\Controllers\JefeOficinaController::class, 'updateVacante'])->name('jefeoficina.vacante.update');
Route::get('jefeoficina/expedientes', [App\Http\Controllers\JefeOficinaController::class, 'showAllExpedientes'])->name('jefeoficina.expedientes');
Route::get('jefeoficina/expedientes/ver/{idExpediente}', [App\Http\Controllers\JefeOficinaController::class, 'editExpediente'])->name('jefeoficina.expedientes.edit');
Route::get('jefeoficina/expedientes/eliminar/{idExpediente}', [App\Http\Controllers\JefeOficinaController::class, 'eliminarExpediente'])->name('jefeoficina.expedientes.delete');


Route::post('jefeoficina/expedientes/asignarAsesor', [App\Http\Controllers\JefeOficinaController::class, 'asignarAsesor'])->name('jefeoficina.expediente.asignarAsesor');
Route::get('jefeoficina/login', [App\Http\Controllers\AuthJefeOficina\JefeOficinaLoginController::class, 'showLoginForm'])->name('jefeoficina.login');
Route::post('jefeoficina/login', [App\Http\Controllers\AuthJefeOficina\JefeOficinaLoginController::class, 'login'])->name('jefeoficina.login.submit');
Route::post('jefeoficina/expedientes/comentar', [App\Http\Controllers\JefeOficinaController::class, 'agregarComentario'])->name('jefeoficina.expediente.comentar');

Route::get('jefeoficina/documentos/show', [App\Http\Controllers\JefeOficinaController::class, 'showDocumentos'])->name('jefeoficina.show.documentos');
Route::get('jefeoficina/documentos/eliminar/{idDocumento}', [App\Http\Controllers\JefeOficinaController::class, 'deleteDocumentos'])->name('jefeoficina.delete.documento');
Route::post('jefeoficina/documentos/store', [App\Http\Controllers\JefeOficinaController::class, 'storeDocumento'])->name('jefeoficina.documento.store');
Route::post('jefeoficina/expedientes/aprobarDocumento', [App\Http\Controllers\JefeOficinaController::class, 'aprobarDocumento'])->name('jefeoficina.expediente.documento.aprobar');

//
//
//
//






