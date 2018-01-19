<?php namespace App\Http\Controllers\Correspondencia;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
use App\Recibidos;
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



      $correspondencia = Recibidos::join('users', 'recibidos.id_user', '=', 'users.id')
                      ->where('recibidos.id', '=', $id)
                      ->get();
      return $correspondencia;
  }
  public function usuarios(){
      $usuarios = User::get();
      return $usuarios;
  }
  public function nuevo(Request $request)
  {
    $cor = new Recibidos();
    $cor->tipo = $request->c_tipo;
    $cor->f_creacion = $request->c_fecha;
    $cor->remitente = $request->c_remitente;
    $cor->referencia = $request->c_referencia;
    $cor->adjunto = $request->c_adjunto;
    $cor->save();
    // $message = 'llegame esta';
    //    return $request;
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
