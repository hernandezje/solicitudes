<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::group(['middleware' => ['role:administrador']], function () {
    //rutas accesibles solo para administrador
    Route::resource('puesto', App\Http\Controllers\PuestoController::class);
    Route::resource('area', App\Http\Controllers\AreaController::class);
    Route::resource('empleado', App\Http\Controllers\EmpleadoController::class);
    Route::resource('register', App\Http\Controllers\Auth\RegisterController::class);

});
Route::group(['middleware' => ['role:responsable|asistente']], function () {

  Route::resource('requerimiento', App\Http\Controllers\RequerimientoController::class);
  Route::resource('estado', App\Http\Controllers\EstadoController::class);
  Route::resource('productosw', App\Http\Controllers\ProductoswController::class);
  Route::get('/destroy/{id}', [App\Http\Controllers\ProductoswController::class, 'destroy'])->name('productosw.destroy');
  Route::get('/create/{id}', [App\Http\Controllers\ProductoswController::class, 'create'])->name('productosw.create');
  Route::get('/detalle/{id}', [App\Http\Controllers\RequerimientoController::class, 'show1'])->name('requerimiento.show1');

  Route::resource('scrum', App\Http\Controllers\ScrumController::class);


});

Route::group(['middleware' => ['role:responsable']], function () {
    //rutas accesibles solo para responsable
      Route::resource('reporte', App\Http\Controllers\ReporteController::class);
      Route::get('/imprimir', [App\Http\Controllers\ReporteController::class, 'imprimir'])->name('print');
      Route::get('/imprimir2', [App\Http\Controllers\ReporteController::class, 'imprimir2'])->name('print2');


});

  Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('storage/{file}', function ($file) {
    return Storage::disk('local')->response("$file");
});

