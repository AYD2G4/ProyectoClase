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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ControlDeVuelos','ControlDeVuelosController@menu');
Route::get('/estadoAviones','ControlDeVuelosController@estadoAviones');
Route::get('/vuelos','ControlDeVuelosController@Vuelos');
Route::post('/vuelos', 'ControlDeVuelosController@VuelosGuardar');
Route::get('/registroDeVuelos','ControlDeVuelosController@RegistroDeVuelos');
Route::post('/registroDeVuelos', 'ControlDeVuelosController@RegistroDeVuelosGuardar');


Route::get('/manejoDeHorarios','ManejoDeHorariosController@ManejoDeHorarios');
Route::get('/manejoDeHorarios/{id}', 'ManejoDeHorariosController@Editar');
Route::post('/manejoDeHorarios/{id}', 'ManejoDeHorariosController@EditarG');

Auth::routes();



Route::get('/CrearReservacion/{idRegistroVuelo}','ReservacionController@CrearReservacion');
Route::get('/VerReservaciones','ReservacionController@ListarReservaciones');
Route::get('/QuitarReservacion/{idReservacion}','ReservacionController@QuitarReservacion');


Route::get('/ListarRegistroVuelo','RegistroVueloController@ListarRegistroVuelo');

//------------ Rutas de la reservacion de boletos --------------


//----------------------------------------------------------

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
