<?php namespace App\Http\Controllers\Correspondencia;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
use App\Recibidos;
use App\Proceso;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Redirect;
//use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
//use Barryvdh\DomPDF\PDF;
//use Barryvdh\DomPDF;
use Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CorrespondenciaController extends Controller{

  public function getRecibidoView(){
    $correspondencia = Recibidos::get();
  	return view('Correspondencia/recibida', compact('correspondencia'));
  }
  public function getDatos($id){


      $correspondencia = Recibidos::join('procesos as p', 'recibidos.id', '=', 'p.id_recibido')
                      ->join('users as u', 'p.id_user_destino', '=', 'u.id')
                      ->select('remitente', 'recibidos.codigo as codigo',
                      'recibidos.referencia as referencia', 'recibidos.estado as estado',
                      'recibidos.tipo as tipo', 'recibidos.f_creacion as f_creacion',
                      'recibidos.adjunto as adjunto', 'u.nombre as nombre', 'u.paterno as paterno', 'observacion')
                      ->where('recibidos.id', '=', $id)
                      ->get();
      return $correspondencia;
  }
  public function usuarios(){
      $usuarios = User::get();
      return $usuarios;
  }
  public function eliminar($id){
    $flight = Recibidos::find($id);
    $flight->delete();
    $message = 'Se Elimino al Usuario de nuestros registros';
    return $message;
  }
  public function nuevo(Request $request)
  {
    //dd($request);
    $c= Recibidos::orderBy('id_recibido', 'desc')
                      ->first();
    $id = $c->id_recibido + 1;

    //Archivo
    //obtenemos el campo file definido en el formulario
    $file = $request->file('archivo');
    //obtenemos el nombre del archivo
    $nombre = $file->getClientOriginalName();
    $url = storage_path('app/').$nombre;
    \Storage::disk('local')->put($nombre,  \File::get($file));


    $cor = new Recibidos();
    $cor->id_recibido = $id;
    $cor->tipo = $request->c_tipo;
    $cor->f_creacion = $request->c_fecha;
    $cor->codigo = 'R-' . str_pad($id, 3, '0', STR_PAD_LEFT);
    $cor->remitente = $request->c_remitente;
    $cor->referencia = $request->c_referencia;
    $cor->adjunto = 'Carta';
    $cor->file = $nombre;
    $cor->observacion = $request->c_obs;
    $cor->estado = $request->c_estado;
    $cor->accion = $request->c_accion;
    $cor->save();

    $idd= Recibidos::where('id_recibido', $id)
                      ->first();

    $cor = new Proceso();
    $cor->accion = $request->c_accion;
    $cor->estado = $request->c_estado;
    $cor->referencia = $request->c_referencia;
    $cor->id_recibido = $idd->id;
    $cor->id_user = Auth::id();
    $cor->id_user_destino = $request->c_der;
    $cor->save();

    return back()->withInput();
  }
	// public function saveRegistro(Request $request){
	// 	$user = new User();
	// 	$user->nombre = $request->nombres;
	// 	$user->paterno  = $request->paterno;
	// 	$user->cargo = $request->cargo;
	// 	$user->username  = $request->username;
	// 	$user->email   = $request->email;
	// 	$user->img   = $request->img;
	// 	$user->password  = bcrypt($request->password);
	// 	$user->ROLE      = $request->rol;
	// 	$user->save();
	// 	return Redirect::back()->with(['success' => ' ']);
	// }
	// public function viewModificar()
	// {
	// 	$users = User::paginate();
	// 	return view('Usuarios/modificar', compact('users'));
	// }
	// public function viewModificarUsuario(Request $request){
	// 	$user = User::find($request->_idUser);
	// 	return view('Usuarios/modificarUsuario', compact('user'));
	// }
	// public function saveModificar(Request $request){
	// 	$user = new User();
	// 	$user->nombre = $request->nombres;
	// 	$user->paterno  = $request->paterno;
	// 	$user->cargo        = $request->cargo;
	// 	$user->email   = $request->email;
	// 	$user->password  = bcrypt($request->password);
	// 	$user->role      = 'USER';
	// 	$user->save();
	// 	return Redirect::back()->with(['success' => ' ']);
	// }
	// public function modificar(Request $request){
	// 	$user = User::find($request->id);
	// 	$user->nombre = $request->nombres;
	// 	$user->paterno  = $request->paterno;
	// 	$user->email        = $request->email;
	// 	$user->cargo = $request->cargo;
	// 	$user->save();
	// 	return redirect('panel');
	// }
}
