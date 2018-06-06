<?php

namespace App\Http\Controllers;

use App\User;
use App\Horario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;
use Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
class AsistenciaController extends Controller
{
    public function getView(){

      $anio = ['2018'];
      $mes = ['Febrero', 'Marzo'];
      return view('Asistencia/index', compact('anio', 'mes'));
    }
    public function consultarProfin(Request $request){

      $mes = $request->mes;
      $anio = $request->anio;

      return Redirect::route('asisprofin.reporte', array('anio' => $anio, 'mes' => $mes));
    }
    public function getViewProfin() {
      $anio = ['2018'];
      $mes = ['Febrero', 'Marzo'];
      return view('Asistencia/profin', compact('anio', 'mes'));
    }
    public function getPlanilla(){
      $anio = ['2018'];
      $mes = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
      return view('Asistencia/plantilla', compact('anio', 'mes'));
    }
    public function consultar(Request $request){
        $id = Auth::id();
        $mes = $request->mes;
        $anio = $request->anio;


        return Redirect::route('asistencia.reporte', array('id' => $id, 'anio' => $anio, 'mes' => $mes));

        //return view('Asistencia/reporte', compact('reporte'));

    }
    //PROFIN
    public function reporteProfin($anio, $mes){

      $reporte = Horario::join('users as u', 'id_user', 'u.id')
                  ->whereYear('fecha', $anio)
                  ->whereMonth('fecha', $mes)
                  ->paginate(15);
      return view('Asistencia/profinReporte', compact('reporte', 'anio', 'mes'));
    }
    public function getReporteProfinView($anio, $mes){

      $users = User::get();
      $reporte = Horario::join('users as u', 'id_user', 'u.id')
                  ->whereYear('fecha', $anio)
                  ->whereMonth('fecha', $mes)
                  ->get();
      $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio',
                'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
      $ac = $meses[$mes-1];
      return view('Reportes/asistenciaProfin', compact('reporte', 'anio', 'ac', 'users'));
    }

    //Particular
    public function reporte($id, $anio, $mes){

      $reporte = Horario::where('id_user', $id)
                  ->whereYear('fecha', $anio)
                  ->whereMonth('fecha', $mes)
                  ->paginate(10);
      return view('Asistencia/reporte', compact('reporte', 'anio', 'mes'));
    }
    public function getReporteView($id, $anio, $mes){

      $reporte = Horario::where('id_user', $id)
                  ->whereYear('fecha', $anio)
                  ->whereMonth('fecha', $mes)
                  ->get();
      return view('Reportes/asistencia', compact('reporte', 'anio', 'mes'));
    }
    public function save(Request $request)
    {
        //\PHPExcel_Settings::setZipClass(\PHPExcel_Settings::PCLZIP);
        $this->subir = $request;
        //obtenemos el campo file definido en el formulario
        $file = $request->file('archivo');
        //obtenemos el nombre del archivo
        $nombre = $file->getClientOriginalName();
        $url = storage_path('app/').$nombre;

        \Storage::disk('local')->put($nombre,  \File::get($file));
        Excel::load($url, function($reader) {
            $results = $reader->get();
            for ($i=0; $i < count($results); $i = $i + 4) {
              $ci = $results[$i]['id_numero'];
              $id = User::select('id')
                          ->where('ci', $ci)
                          ->first();
              $hor = new Horario();
              $f2 = Carbon::createFromTime(9, 1, 0);
              $f3 = Carbon::createFromTime(9, 0, 0);
              $hor->fecha   = $results[$i]['fechahora']->toDateString();
              $hor->hora_in = $results[$i]['fechahora']->toTimeString();
              $hor->hora_alm_in = $results[$i+1]['fechahora']->toTimeString();
              $hor->hora_alm_out = $results[$i+2]['fechahora']->toTimeString();
              $hor->hora_out = $results[$i+3]['fechahora']->toTimeString();
              $hor->id_user = $id->id;
              $ba = false;
              $hor->htrabajado = $f2;
              $hora_inicio = new Carbon($results[$i]['fechahora']->toTimeString());
              if(!$hora_inicio->lt($f2) && $results[$i]['justificativo'] == NULL)
              {
                $atraso = $hora_inicio->diffInMinutes($f3);
                //$hor->atraso = Carbon::createFromTime(9, 1, 0);;
                $hor->atraso = $atraso;
              }
              else
              {
                $hor->atraso = Carbon::createFromTime(0, 0, 0);
              }
              for($j = $i; $j < $i + 4; $j++){

                if($results[$j]['justificativo'] != NULL){
                  $hor->justificativo = $results[$j]['justificativo'];
                  $ba = true;
                  break;
                }
              }
              if(!$ba){

                $hor->justificativo = $results[$i]['justificativo'];
              }
              $hor->save();
            }

        });
        //return $pdf->download('Reporte_Usuarios_'.$carbon->now(new \DateTimeZone('America/La_Paz'))->toDateTimeString().'.pdf');
        return Redirect::back()->with(['success' => ' ']);
        //dd($request);
    }
}
