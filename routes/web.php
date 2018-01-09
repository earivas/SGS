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
use SGS\Beneficiario;



Route::get('/ajax-precio', function(){
    $ben_id = Request::get('ben_id');
    $precio = Beneficiario::where('idbeneficiario','=',$ben_id)->get();
    return Response::json($precio);
});


Route::get('/', function () {
    return view('Auth/login');
});



Route::resource('catalogo/categoria','CategoriaController');
Route::resource('catalogo/modelo','ModeloController');
Route::resource('ventas/beneficiario','BeneficiarioController');
Route::resource('ventas/plataforma','PlataformaController');
Route::resource('ventas/venta','VentaController');
Route::resource('pagos/pago','PagoController');
Route::resource('compras/proveedor','ProveedorController');
Route::resource('seguridad/usuario','UsuarioController');
Route::resource('/estadistica','EstadisticaController');


Auth::routes();
Route::Auth();
//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@logout');
//Route::get('/{slug?}','HomeController@index');
//Route::get('/estadistica', 'EstadisticaController@index')->name('estadistica');
Route::get('/{slug?}','EstadisticaController@index');

