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
Route::get('/correspondencia/datos/{id}', 'Correspondencia\CorrespondenciaController@getDatos');
Route::get('/correspondencia/recibida', 'Correspondencia\CorrespondenciaController@getRecibidoView');
Route::delete('/correspondencia/eliminar/{id}', 'Correspondencia\CorrespondenciaController@eliminar');
Route::get('/correspondencia/usuarios', 'Correspondencia\CorrespondenciaController@usuarios');
Route::post('/correspondencia/nuevo', 'Correspondencia\CorrespondenciaController@nuevo');
//PENDIENTES
Route::get('/pendientes','DataTables\RecibidoController@getPendientes');

//Ruta
Route::get('/correspondencia/ruta/{id}','Correspondencia\CorrespondenciaController@getRuta');
Route::post('/correspondencia/rutanuevo', 'Correspondencia\CorrespondenciaController@saveRuta');

//Enviados
Route::post('/enviado/nuevo','Correspondencia\CorrespondenciaController@nuevoEnviado');

//REPORTES
Route::get('/reporte/hoja/{id}','Correspondencia\CorrespondenciaController@getReporteHojaView');

//get archivo
Route::get('storage/{archivo}', function ($archivo) {
    $url = storage_path('app/').$archivo;
    //verificamos si el archivo existe y lo retornamos
    if (\Illuminate\Support\Facades\Storage::exists($archivo))
    {
        return response()->download($url);
    }
    //si no se encuentra lanzamos un error 404.
    abort(404);
});

Route::resource('recibidos', 'RecibidosController');

Route::Resource('apis', 'ApiController');
Route::Resource('aps', 'ApiEnviadoController');

Route::get('/recibido','DataTables\RecibidoController@getIndex');
Route::get('/anyData','DataTables\RecibidoController@anyData')->name('recibido.data');

Route::get('/pendData','DataTables\RecibidoController@pendData')->name('pendientes.data');

Route::get('/enviado','DataTables\EmisionController@getIndex');
Route::get('/anyDataEnviado','DataTables\EmisionController@sendData')->name('enviado.data');

Route::get('/enviadoGeneral','DataTables\EmisionController@getIndexG');
Route::get('/anyDataEnviadoG','DataTables\EmisionController@sendDataG')->name('enviadog.data');
// Route::controller('recibido', '', [
//     'anyData'  => 'recibido.data',
//     'getIndex' => 'recibido',
// ]);
