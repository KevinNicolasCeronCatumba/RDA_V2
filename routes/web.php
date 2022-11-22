<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoluntarioController;
use App\Http\Controllers\ObservacionesController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\RecursosController;
use App\Http\Controllers\DetalleRecursosController;
use App\Http\Controllers\TerrenoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\RecuperarController;


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

$controller_path = 'App\Http\Controllers';

// Main Page Route
Route::get('/dashboard', $controller_path . '\dashboard\Analytics@index')->name('dashboard-analytics');


// crud - voluntarios - observaciones
Route::resource('voluntarios' , VoluntarioController::class );
Route::resource('observaciones' , ObservacionesController::class );
//Crud - usuarios -recursos - detalle recursos
Route::resource('usuarios' , UsuariosController::class );
Route::resource('recursos' , RecursosController::class );
Route::resource('detallerecursos' , DetalleRecursosController::class );
Route::resource('terrenos', TerrenoController::class );
Route::resource('empresas', EmpresaController::class );
Route::resource('eventos', EventoController::class);
Route::resource('recuperar', RecuperarController::class);

//Ruta gestión de voluntarios en los evento
Route::get('grupo/{id}/organize', $controller_path . '\Evento_voluntarioController@organize')->name('grupos.organize');
Route::post('grupo/{id}', $controller_path . '\Evento_voluntarioController@store')->name('grupos.guardar');
Route::post('grupo/{id}/eliminar', $controller_path . '\Evento_voluntarioController@eliminar')->name('grupos.eliminar');


// layout
Route::get('/layouts/without-menu', $controller_path . '\layouts\WithoutMenu@index')->name('layouts-without-menu');
Route::get('/layouts/without-navbar', $controller_path . '\layouts\WithoutNavbar@index')->name('layouts-without-navbar');
Route::get('/layouts/fluid', $controller_path . '\layouts\Fluid@index')->name('layouts-fluid');
Route::get('/layouts/container', $controller_path . '\layouts\Container@index')->name('layouts-container');
Route::get('/layouts/blank', $controller_path . '\layouts\Blank@index')->name('layouts-blank');


// pages - notFound - mantenimiento
Route::get('/pages/misc-error', $controller_path . '\pages\MiscError@index')->name('pages-misc-error');
Route::get('/pages/misc-under-maintenance', $controller_path . '\pages\MiscUnderMaintenance@index')->name('pages-misc-under-maintenance');

//Ejemplo PDF
Route::get('/pdf/{id}', [PDFController::class, 'pdf'])->name('descargarPDF');

