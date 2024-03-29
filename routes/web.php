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

Route::get('/', 'UserController@info')->name('index');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {

//Rutas de Roles
    Route::get('roles', 'RoleController@index')->name('roles.index')
        ->middleware('permission:roles.index');
    Route::get('roles/create', 'RoleController@create')->name('roles.create')
        ->middleware('permission:roles.create');
    Route::post('roles/store', 'RoleController@store')->name('roles.store')
        ->middleware('permission:roles.create');
    Route::get('roles/{id}/edit', 'RoleController@edit')->name('roles.edit')
        ->middleware('permission:roles.edit');
    Route::post('roles/{id}/update', 'RoleController@update')->name('roles.update')
        ->middleware('permission:roles.edit');
    Route::get('roles/{id}/show', 'RoleController@show')->name('roles.show')
        ->middleware('permission:roles.show');
    Route::delete('roles/{id}', 'RoleController@destroy')->name('roles.destroy')
        ->middleware('permission:roles.destroy');

    //Rutas de usuarios
    Route::get('users', 'UserController@index')->name('users.index')
        ->middleware('permission:users.index');
    Route::post('users/store', 'UserController@store')->name('users.store')
        ->middleware('permission:users.create');
    Route::delete('users/{id}', 'UserController@destroy')->name('users.destroy')
        ->middleware('permission:users.destroy');
    Route::get('users/{id}/edit', 'UserController@edit')->name('users.edit')
        ->middleware('permission:users.edit');
    Route::post('users/{id}/update', 'UserController@update')->name('users.update')
        ->middleware('permission:users.edit');
    Route::get('users/{id}/show', 'UserController@show')->name('users.show')
        ->middleware('permission:users.show');

//    Rutas de citas médicas -> Reservaciones
    Route::get('reservations', 'ReservationController@index')->name('reservations.index')
        ->middleware('permission:reservations.index');
    Route::post('reservations/store', 'ReservationController@store')->name('reservations.store')
        ->middleware('permission:reservations.create');
    Route::get('reservations/datosCalendario', 'ReservationController@datosCalendario')->name('reservations.datosCalendario')
        ->middleware('permission:reservations.index');
    Route::delete('reservations/{id}', 'ReservationController@destroy')->name('reservations.destroy')
        ->middleware('permission:reservations.destroy');
    Route::get('reservations/{id}/atenderCita', 'ReservationController@atenderCita')->name('reservations.atenderCita')
        ->middleware('permission:reservations.atenderCita');

//    Rutas de crear consulta
    Route::get('crearConsultas', 'ConsultaController@index')->name('crearConsultas.index')
        ->middleware('permission:crearConsultas.index');
    Route::get('crearConsultas/{cedula}', 'ConsultaController@buscarPaciente')->name('crearConsultas.buscarUsuario')
        ->middleware('permission:crearConsultas.index');
    Route::post('crearConsultas/store', 'ConsultaController@store')->name('crearConsultas.store')
        ->middleware('permission:crearConsultas.create');
    Route::get('crearConsultas/{id}/edit', 'ConsultaController@edit')->name('crearConsultas.edit')
        ->middleware('permission:crearConsultas.edit');
    Route::put('crearConsultas/{id}/update', 'ConsultaController@update')->name('crearConsultas.update')
        ->middleware('permission:crearConsultas.edit');
    Route::delete('crearConsultas/{id}/destroy', 'ConsultaController@destroy')->name('crearConsultas.destroy')
        ->middleware('permission:crearConsultas.destroy');


//    Rutas de consultas
    Route::get('consultas', 'GestionConsultasController@index')->name('consultas.index')
        ->middleware('permission:consultas.index');
    Route::get('consultas/{id}/atender', 'GestionConsultasController@show')->name('consultas.atender')
        ->middleware('permission:consultas.atender');
    Route::post('consultas/{id}/store', 'GestionConsultasController@store')->name('consultas.store')
        ->middleware('permission:consultas.atender');
    Route::get('consultas/{id}/edit', 'GestionConsultasController@edit')->name('consultas.edit')
        ->middleware('permission:consultas.edit');
    Route::put('consultas/{id}/update', 'GestionConsultasController@update')->name('consultas.update')
        ->middleware('permission:consultas.edit');
    Route::get('consultas/{id}/verResultadoConsulta', 'GestionConsultasController@verResultadoConsulta')->name('consultas.verResultadoConsulta')
        ->middleware('permission:consultas.show');


//    Rutas de Historias de usuario en los usuarios
    Route::get('users/{id}/show/historia', 'UserController@historias')->name('historia.index')
        ->middleware('permission:historia.index');
    Route::get('users/{id}/historia/{id_historia}/show', 'UserController@historias_show')->name('historia.show')
        ->middleware('permission:historia.show');

//    Rutas Inventario
    Route::get('inventario', 'InventarioController@index')->name('inventario.index')
        ->middleware('permission:inventario.index');
    Route::post('inventario/store', 'InventarioController@store')->name('inventario.store')
        ->middleware('permission:inventario.create');
    Route::get('inventario/{id}/show', 'InventarioController@show')->name('inventario.show')
        ->middleware('permission:inventario.show');
    Route::delete('inventario/{id}', 'InventarioController@destroy')->name('inventario.destroy')
        ->middleware('permission:inventario.destroy');
    Route::get('inventario/{id}/edit', 'InventarioController@edit')->name('inventario.edit')
        ->middleware('permission:inventario.edit');
    Route::post('inventario/{id}/update', 'InventarioController@update')->name('inventario.update')
        ->middleware('permission:inventario.edit');

    //   Rutas historias clinicas
    Route::get('historiaClinica', 'HistoriaClinicaController@index')->name('historiaClinica.index')
        ->middleware('permission:historiaClinica.index');
    Route::get('historiaClinica/{id}/show', 'HistoriaClinicaController@show')->name('historiaClinica.show')
        ->middleware('permission:historiaClinica.show');


    //    Rutas de tipos de examenes
    Route::get('gruposDetalleTipoExamen', 'GruposDetalleTipoExamenController@index')->name('gruposDetalleTipoExamen.index')
        ->middleware('permission:gruposDetalleTipoExamen.index');
    Route::get('gruposDetalleTipoExamen/{id}/edit', 'GruposDetalleTipoExamenController@edit')->name('gruposDetalleTipoExamen.edit')
        ->middleware('permission:gruposDetalleTipoExamen.index');
    Route::post('gruposDetalleTipoExamen/{id}/update', 'GruposDetalleTipoExamenController@update')->name('gruposDetalleTipoExamen.update')
        ->middleware('permission:gruposDetalleTipoExamen.index');
    Route::post('gruposDetalleTipoExamen/store', 'GruposDetalleTipoExamenController@store')->name('gruposDetalleTipoExamen.store')
        ->middleware('permission:gruposDetalleTipoExamen.index');
    Route::get('gruposDetalleTipoExamen/{id}/show', 'GruposDetalleTipoExamenController@show')->name('gruposDetalleTipoExamen.show')
        ->middleware('permission:gruposDetalleTipoExamen.index');
    Route::delete('gruposDetalleTipoExamen/{id}', 'GruposDetalleTipoExamenController@destroy')->name('gruposDetalleTipoExamen.destroy')
        ->middleware('permission:gruposDetalleTipoExamen.index');

    //    Rutas de grupos de examenes
    Route::get('gruposExamenes', 'GruposExamenController@index')->name('gruposExamenes.index')
        ->middleware('permission:gruposDetalleTipoExamen.index');
    Route::get('gruposExamenes/{id}/edit', 'GruposExamenController@edit')->name('gruposExamenes.edit')
        ->middleware('permission:gruposDetalleTipoExamen.index');
    Route::post('gruposExamenes/{id}/update', 'GruposExamenController@update')->name('gruposExamenes.update')
        ->middleware('permission:gruposDetalleTipoExamen.index');
    Route::post('gruposExamenes/store', 'GruposExamenController@store')->name('gruposExamenes.store')
        ->middleware('permission:gruposDetalleTipoExamen.index');
    Route::delete('gruposExamenes/{id}', 'GruposExamenController@destroy')->name('gruposExamenes.destroy')
        ->middleware('permission:gruposDetalleTipoExamen.index');
    Route::get('gruposExamenes/{id}/show', 'GruposExamenController@show')->name('gruposExamenes.show')
        ->middleware('permission:gruposDetalleTipoExamen.index');


    //RUTAS DEL DASHBOARD
    //grafica
    Route::get('grafica/insumos', 'graficaController@insumos')->name('grafica.insumos');

    Route::post('totalCostos', 'HomeController@totalCostos')->name('totalCostos');



    /////
    //pdf
    Route::name('print')->get('/imprimir/{id}', 'GeneradorPdfController@imprimir');

    //email
    Route::get('email/{id}', 'EnviarResultadosMailController@enviar_resultados_email_to_user')
        ->name('email_resultados.index');


});
