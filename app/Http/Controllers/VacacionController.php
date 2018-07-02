<?php

namespace App\Http\Controllers;

use App\User;
use App\Horario;
use App\Vacacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;
use Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

use App\Mail\CorrespondenciaPendiente;
use Illuminate\Support\Facades\Mail;
class VacacionController extends Controller
{
    public function getView(){
      $users = User::get();
      $user = auth()->user();
      Mail::to($user)->send(new CorrespondenciaPendiente($user));
      return view('Vacacion/index', compact('users'));
    }
    public function save(Request $request){

      $user = User::find($request->usuario);
      $boleta = $user->boleta + 1;

      $v = new Vacacion();
      $v->id_user = $request->usuario;
      $v->inicio = $request->de;
      $v->fin = $request->hasta;
      $v->duracion = $request->duracion;
      $v->ultimo_trabajo = $request->ultimo;
      $v->reanudacion_trabajo = $request->reanudacion;
      $v->observacion = $request->obs;
      $v->boleta = $boleta;
      $v->tipo = 'Vacacion';
      $v->save();

      $user = User::find($request->usuario);
      $saldo = $user->v_saldo;
      $user->v_saldo =  $saldo - $request->duracion;
      $user->boleta = $boleta;
      $user->save();
      $idq = Vacacion::orderBy('created_at', 'desc')->first();
      $id = $idq->id;
      return Redirect::route('vacacion.reporte', array('id' => $id));
    }
    public function getAsignacionView(){
      $users = User::get();
      return view('Vacacion/asignacion', compact('users'));
    }
    public function saveAsignacion(Request $request){
      $user = User::find($request->usuario);
      $boleta = $user->boleta + 1;

      $v = new Vacacion();
      $v->id_user = $request->usuario;
      $v->inicio = '2000-01-01';
      $v->fin = '2000-01-01';
      $v->duracion = $request->duracion;
      $v->ultimo_trabajo = '2000-01-01';
      $v->reanudacion_trabajo = '2000-01-01';
      $v->observacion = $request->obs;
      $v->boleta = $boleta;
      //$v->boleta = 0;
      $v->tipo = 'Asignacion';
      $v->save();


      $user = User::find($request->usuario);
      $saldo = $user->v_saldo;
      $user->v_saldo =  $saldo + $request->duracion;
      $user->boleta = $boleta;
      $user->save();


      $idq = Vacacion::orderBy('created_at', 'desc')->first();
      $id = $idq->id;
      return Redirect::route('asignacion.reporte', array('id' => $id));

    }
    public function reporte($id){
        $reporte = Vacacion::join('users as u', 'u.id', 'vacacions.id_user')
                    ->join('users as u2', 'u2.id', 'u.jefe')
                    ->where('vacacions.id', $id)
                    ->select('u.nombre as nnombre', 'u.paterno as npaterno', 'u.boleta', 'u.v_saldo',
                    'u2.nombre', 'u2.paterno', 'inicio', 'fin', 'duracion','ultimo_trabajo', 'reanudacion_trabajo',
                    'observacion')
                    ->get();

        return view('Reportes/vacacionSolicitada', compact('reporte'));
    }
    public function reporteAsignacion($id){
      $reporte = Vacacion::join('users as u', 'u.id', 'vacacions.id_user')
                  ->join('users as u2', 'u2.id', 'u.jefe')
                  ->where('vacacions.id', $id)
                  ->select('u.nombre as nnombre', 'u.paterno as npaterno', 'u.boleta', 'u.v_saldo',
                  'u2.nombre', 'u2.paterno', 'duracion', 'observacion')
                  ->get();

      return view('Reportes/asignacion', compact('reporte'));
    }
    public function control(){


      $reporte = Vacacion::join('users as u', 'u.id', 'vacacions.id_user')
                  ->where('vacacions.id_user', Auth::id())
                  ->select('inicio', 'fin', 'vacacions.boleta', 'u.v_saldo',
                  'duracion', 'observacion', 'tipo')
                  ->orderBy('vacacions.created_at', 'asc')
                  ->get();

      return view('Vacacion/control', compact('reporte'));
    }
    public function reporteControl(){
      $reporte = Vacacion::join('users as u', 'u.id', 'vacacions.id_user')
                  ->where('vacacions.id_user', Auth::id())
                  ->select('inicio', 'fin', 'vacacions.boleta', 'u.v_saldo',
                  'duracion', 'observacion', 'tipo')
                  ->orderBy('vacacions.created_at', 'asc')
                  ->get();
      return view('Reportes/control', compact('reporte'));
    }
    public function atrasos(){
        $reporte = Horario::join('users as u', 'id_user', 'u.id')
                  ->where('atraso', '>', '00:00')
                  ->select('horarios.id', 'fecha', 'atraso', 'nombre', 'paterno', 'hora_in')
                  ->orderBy('fecha', 'desc')
                  ->paginate(15);
        return view('Vacacion/atrasos', compact('reporte'));
    }
    public function getReporteAtraso($id)
    {
      $reporte = Horario::find($id);
      $user = User::find($reporte->id_user);
      $boleta = $user->boleta + 1;

      $v = new Vacacion();
      $v->id_user = $user->id;
      $v->inicio = '2000-01-01';
      $v->fin = '2000-01-01';
      $v->duracion = '0.5';
      $v->ultimo_trabajo = '2000-01-01';
      $v->reanudacion_trabajo = '2000-01-01';
      $v->observacion = 'Retraso en fecha: '.$reporte->fecha;
      $v->boleta = $boleta;
      $v->tipo = 'Atraso';
      $v->save();


      $saldo = $user->v_saldo;
      $user->v_saldo =  $saldo - 0.5;
      $user->boleta = $boleta;
      $user->save();
      $idq = Vacacion::orderBy('created_at', 'desc')->first();
      $id = $idq->id;

      $reporte = Vacacion::join('users as u', 'u.id', 'vacacions.id_user')
                  ->where('vacacions.id', $id)
                  ->select('u.nombre as nnombre', 'u.paterno as npaterno', 'u.boleta', 'u.v_saldo',
                   'duracion', 'observacion')
                  ->get();
      return view('Reportes/atraso', compact('reporte'));
    }
}
