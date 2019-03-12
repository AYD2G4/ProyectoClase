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

//----------------- Rutas de control de vuelos ---------------
Route::get('/ControlDeVuelos','ControlDeVuelosController@menu');
Route::get('/estadoAviones','ControlDeVuelosController@estadoAviones');
Route::get('/vuelos','ControlDeVuelosController@Vuelos');
Route::post('/vuelos', 'ControlDeVuelosController@VuelosGuardar');
Route::get('/registroDeVuelos','ControlDeVuelosController@RegistroDeVuelos');
Route::post('/registroDeVuelos', 'ControlDeVuelosController@RegistroDeVuelosGuardar');


Auth::routes();
//----------------------------------------------------------------

Route::get('/ListarRegistroVuelo','RegistroVueloController@ListarRegistroVuelo');

Route::get('/ListarRegistroVuelo','RegistroVueloController@ListarRegistroVuelo');
Route::get('/DisponibilidadRegistroVuelo','ControlDeVuelosController@menu');

//---------- Procesar boletos --------------------------
Route::get('/VerDisponibilidad/{registro_vuelo_id}','DetalleCompraAuxiliarController@VerificarDisponibilidad');
Route::post('/VerDisponibilidad/{registro_vuelo_id}','DetalleCompraAuxiliarController@VerificarDisponibilidad1');
//------------ Rutas de la Compra de boletos --------------
//-------- Carrito -------
Route::get('/VerCarrito','DetalleCompraAuxiliarController@ListarCompras');
Route::post('/QuitarCarrito/{registro_vuelo_id}','DetalleCompraAuxiliarController@QuitarCantidadCarrito');
//------------------------
//--------- Procesar compra y vaciar carrito ----------
Route::get('/ProcesarCompra','CompraController@ProcesarCompra');
Route::get('/VerCompras','CompraController@ListarCompras');
Route::get('/ListarDetalleCompra/{compra_id}','CompraController@ListarDetalleCompra');

//------------------------------------------------------
//----------------------------------------------------------
//----------- Reservaciones
Route::get('/VerReservaciones','ReservacionController@ListarReservaciones');
Route::post('/QuitarReservacion/{registro_vuelo_id}','ReservacionController@QuitarCantidadReservacion');
//-----------------------------------------------------------------
Route::get('/CrearBoletosAvion/{registro_vuelo_id}/{cantidad}','RegistroVueloController@GenerarBoletosAvion');
//----------------------------------------------------------------

//------------- Rutas Cargo ----------------------------
Route::get('/CrearCargo', 'CargosController@VistaCrearCargo');
Route::post('/CrearCargo', 'CargosController@VistaGuardarCargo');
Route::get('/ListarCargos', 'CargosController@VistaListarCargo');
Route::get('/ElminarCargo/{idCargo}', 'CargosController@VistaEliminarCargo');
//-------------------------------------------------------

//------------- Rutas Empleado -----------------------------
Route::get('/CrearEmpleado', 'EmpleadoController@VistaCrearEmpleado');
Route::post('/CrearEmpleado', 'EmpleadoController@VistaGuardarEmpleado');
Route::get('/ListarEmpleado', 'EmpleadoController@VistaListarEmpleado');
Route::get('/EliminarEmpleado/{idEmpleado}', 'EmpleadoController@VistaEliminarEmpleado');
//----------------------------------------------------------
//------------ Rutas Tripulacion --------------------------------------
Route::get('/ListarTripulacion/{registro_vuelo_id}', 'TripulanteController@VistaListarTripulacion');
Route::get('/SeleccionarEmpleado/{registro_vuelo_id}/{cargo_id}', 'TripulanteController@VistaListarEmpleadoSeleccionar');
Route::get('/AsignarTripulante/{registro_vuelo_id}/{cargo_id}/{idEmpleado}', 'TripulanteController@AsignarTripulante');
Route::get('/QuitarTripulante/{registro_vuelo_id}/{idtripulante}', 'TripulanteController@QuitrarTripulante');
//-------------------------------------------------------------------
//------------ Rutas Avion -------------------------------------------
Route::get('/CrearAvion', 'AvionController@VistaCrearAvion');
Route::post('/CrearAvion', 'AvionController@VistaGuardarAvion');
Route::get('/ListarAviones', 'AvionController@VistaListarAvion');
Route::get('/EliminarAvion/{idAvion}', 'AvionController@VistaEliminarAvion');
//--------------------------------------------------------------------
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
