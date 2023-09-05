<?php

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

/* Route::get('/', function () {
    return view('welcome');
}); */

Auth::routes();

#INICIO
Route::get('/', 'HomeController@index')->name('home');

#TALLERES
Route::get('/talleres', 'TalleresController@index')->name('talleres.index');
Route::get('/talleres/registrar', 'TalleresController@create')->name('talleres.create');
Route::post('/talleres/guardar', 'TalleresController@store')->name('talleres.store');
Route::put('/talleres/actualizar/{id}', 'TalleresController@update')->name('talleres.update');
Route::delete('/talleres/eliminar/{id}', 'TalleresController@destroy')->name('talleres.delete');
Route::get('/talleres/editar/{id}', 'TalleresController@edit')->name('talleres.edit');

#MAQUINARIA
Route::get('/maquinaria', 'MaquinariaController@index')->name('maquinaria.index');
Route::get('/maquinaria/registrar', 'MaquinariaController@create')->name('maquinaria.create');
Route::post('/maquinaria/guardar', 'MaquinariaController@store')->name('maquinaria.store');
Route::get('/maquinaria/detalles/{id}', 'MaquinariaController@show')->name('maquinaria.show');
Route::get('/maquinaria/editar/{id}', 'MaquinariaController@edit')->name('maquinaria.edit');
Route::put('/maquinaria/actualizar/{id}', 'MaquinariaController@update')->name('maquinaria.update');
Route::delete('/maquinaria/eliminar/{id}', 'MaquinariaController@destroy')->name('maquinaria.delete');

#REPUESTOS
Route::get('/repuestos', 'RepuestosController@index')->name('repuestos.index');
Route::get('/repuestos/registrar', 'RepuestosController@create')->name('repuestos.create');
Route::post('/repuestos/guardar', 'RepuestosController@store')->name('repuestos.store');
Route::get('/repuestos/editar/{id}', 'RepuestosController@edit')->name('repuestos.edit');
Route::put('/repuestos/actualizar/{id}', 'RepuestosController@update')->name('repuestos.update');
Route::delete('/repuestos/eliminar/{id}', 'RepuestosController@destroy')->name('repuestos.delete');

#HERRAMIENTAS
Route::get('/herramientas', 'HerramientasController@index')->name('herramientas.index');
Route::get('/herramientas/registrar', 'HerramientasController@create')->name('herramientas.create');
Route::post('/herramientas/guardar', 'HerramientasController@store')->name('herramientas.store');
Route::get('/herramientas/editar/{id}', 'HerramientasController@edit')->name('herramientas.edit');
Route::put('/herramientas/actualizar/{id}', 'HerramientasController@update')->name('herramientas.update');
Route::delete('/herramientas/eliminar/{id}', 'HerramientasController@destroy')->name('herramientas.delete');

#PERSONAL
Route::get('/personal', 'PersonalController@index')->name('personal.index');
Route::get('/personal/registrar', 'PersonalController@create')->name('personal.create');
Route::post('/personal/guardar', 'PersonalController@store')->name('personal.store');
Route::get('/personal/editar/{id}', 'PersonalController@edit')->name('personal.edit');
Route::put('/personal/actualizar/{id}', 'PersonalController@update')->name('personal.update');
Route::delete('/personal/eliminar/{id}', 'PersonalController@destroy')->name('personal.delete');

#USUARIOS
Route::get('/usuarios', 'UsuariosController@index')->name('usuarios.index');
Route::get('/usuarios/registrar', 'UsuariosController@create')->name('usuarios.create');
Route::post('/usuarios/guardar', 'UsuariosController@store')->name('usuarios.store');
Route::get('/usuarios/editar/{id}', 'UsuariosController@edit')->name('usuarios.edit');
Route::put('/usuarios/actualizar/{id}', 'UsuariosController@update')->name('usuarios.update');
Route::delete('/usuarios/eliminar/{id}', 'UsuariosController@destroy')->name('usuarios.delete');

#COMPRA_REPUESTOS
Route::get('/compra_repuestos', 'CompraRepuestosController@index')->name('compra_repuestos.index');
Route::get('/compra_repuestos/registrar', 'CompraRepuestosController@create')->name('compra_repuestos.create');
Route::post('/compra_repuestos/guardar', 'CompraRepuestosController@store')->name('compra_repuestos.store');
Route::get('/compra_repuestos/editar/{id}', 'CompraRepuestosController@edit')->name('compra_repuestos.edit');
Route::get('/compra_repuestos/completar/{id}', 'CompraRepuestosController@checkIfComplete')->name('compra_repuestos.complete');
Route::get('/compra_repuestos/detalles/{id}', 'CompraRepuestosController@show')->name('compra_repuestos.show');
Route::put('/compra_repuestos/actualizar/{id}', 'CompraRepuestosController@update')->name('compra_repuestos.update');
Route::delete('/compra_repuestos/eliminar/{id}', 'CompraRepuestosController@destroy')->name('compra_repuestos.delete');

#PLAN_MANTENIMIENTO
Route::get('/plan_mantenimiento', 'PlanMantenimientoController@index')->name('plan_mantenimiento.index');
Route::get('/plan_mantenimiento/registrar', 'PlanMantenimientoController@create')->name('plan_mantenimiento.create');
Route::post('/plan_mantenimiento/guardar', 'PlanMantenimientoController@store')->name('plan_mantenimiento.store');
Route::get('/plan_mantenimiento/editar/{id}', 'PlanMantenimientoController@edit')->name('plan_mantenimiento.edit');
Route::get('/plan_mantenimiento/completar/{id}', 'PlanMantenimientoController@checkIfComplete')->name('plan_mantenimiento.complete');
Route::get('/plan_mantenimiento/detalles/{id}', 'PlanMantenimientoController@show')->name('plan_mantenimiento.show');
Route::get('/plan_mantenimiento/calendario', 'PlanMantenimientoController@calendar')->name('plan_mantenimiento.calendar');
Route::put('/plan_mantenimiento/actualizar/{id}', 'PlanMantenimientoController@update')->name('plan_mantenimiento.update');
Route::delete('/plan_mantenimiento/eliminar/{id}', 'PlanMantenimientoController@destroy')->name('plan_mantenimiento.delete');