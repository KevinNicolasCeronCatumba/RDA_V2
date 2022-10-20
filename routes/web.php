<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoluntarioController;
use App\Http\Controllers\ObservacionesController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\RecursosController;
use App\Http\Controllers\DetalleRecursosController;
use App\Http\Controllers\TerrenoController;
use App\Http\Controllers\EmpresaController;


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

$controller_path = 'App\Http\Controllers';

// Main Page Route
Route::get('/', $controller_path . '\dashboard\Analytics@index')->name('dashboard-analytics');


// crud - voluntarios - observaciones
Route::resource('voluntarios' , VoluntarioController::class );
Route::resource('observaciones' , ObservacionesController::class );
//Crud - usuarios -recursos - detalle recursos
Route::resource('usuarios' , UsuariosController::class );
Route::resource('recursos' , RecursosController::class );
Route::resource('detallerecursos' , DetalleRecursosController::class );
Route::resource('terrenos', TerrenoController::class );
Route::resource('empresas', EmpresaController::class );



// layout
Route::get('/layouts/without-menu', $controller_path . '\layouts\WithoutMenu@index')->name('layouts-without-menu');
Route::get('/layouts/without-navbar', $controller_path . '\layouts\WithoutNavbar@index')->name('layouts-without-navbar');
Route::get('/layouts/fluid', $controller_path . '\layouts\Fluid@index')->name('layouts-fluid');
Route::get('/layouts/container', $controller_path . '\layouts\Container@index')->name('layouts-container');
Route::get('/layouts/blank', $controller_path . '\layouts\Blank@index')->name('layouts-blank');


// pages - notFound - mantenimiento
Route::get('/pages/misc-error', $controller_path . '\pages\MiscError@index')->name('pages-misc-error');
Route::get('/pages/misc-under-maintenance', $controller_path . '\pages\MiscUnderMaintenance@index')->name('pages-misc-under-maintenance');

