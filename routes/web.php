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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/panel', 'HomeController@plantilla');

//GESTION DE USUSARIO
Route::get('/user/registro', 'UsuarioController@viewRegistro');
Route::post('/user/save', 'UsuarioController@saveRegistro');

Route::get('/user/modificar', 'UsuarioController@viewModificar');
Route::post('/user/modificar/save', 'UsuarioController@saveModificar');
Route::post('/user/modificarUsuario', 'UsuarioController@viewModificarUsuario');
Route::post('/user/saveModificarUsuario', 'UsuarioController@modificar');
Route::Resource('users', 'UserController');

//RECIBIDOS
Route::get('/correspondencia/recibida', 'Correspondencia\CorrespondenciaController@getRecibidoView');
Route::get('/correspondencia/datos/{id}', 'Correspondencia\CorrespondenciaController@getDatos');

Route::resource('recibidos', 'RecibidosController');


Route::get('/recibido','DataTables\RecibidoController@getIndex');
Route::get('/anyData','DataTables\RecibidoController@anyData')->name('recibido.data');
// Route::controller('recibido', '', [
//     'anyData'  => 'recibido.data',
//     'getIndex' => 'recibido',
// ]);
