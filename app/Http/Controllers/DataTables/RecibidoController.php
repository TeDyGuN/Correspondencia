<?php

namespace App\Http\Controllers\DataTables;
use App\Http\Controllers\Controller;
use App\Recibidos;
use App\User;
use Yajra\Datatables\Services\DataTable;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Redirect;
class RecibidoController extends Controller
{
  public function getIndex()
  {
    return view('Correspondencia.recibidos');
  }
  public function getPendientes()
  {
    return view('Correspondencia.pendiente');
  }

  /**
  * Process datatables ajax request.
  *
  * @return \Illuminate\Http\JsonResponse
  */
  public function anyData()
  {
    $rec = Recibidos::orderBy('id_recibido', 'desc')
    ->select();
    return Datatables::of($rec)
    ->addColumn('action', function ($r) {
                    return '<a href="' . url('/correspondencia/ruta/'.$r->id ) .'" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-sort"></i> Hoja de Ruta</a>
                    <a id="e'.$r->id.'" class="btneliminar btn btn-xs btn-warning" data-toggle="modal" data-target="#mod_eliminar"><i class="glyphicon glyphicon-wrench"></i> Eliminar</a>';
                })

      ->make(true);
  }
  public function pendData()
  {
    $rec = Recibidos::join('procesos as p', 'p.id_recibido', 'recibidos.id')
                    ->where('p.id_user_destino', Auth::id())
                    ->orderBy('recibidos.id_recibido', 'desc')
                    ->select('recibidos.id as id', 'recibidos.codigo as codigo', 'recibidos.tipo as tipo',
                  'recibidos.f_creacion as f_creacion', 'recibidos.remitente as remitente',
                  'recibidos.referencia as referencia', 'recibidos.estado as estado');
    return Datatables::of($rec)
    ->addColumn('action', function ($r) {
                    return '<a href="' . url('/correspondencia/ruta/'.$r->id ) .'" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-sort"></i> Hoja de Ruta</a>';
                })

      ->make(true);
  }

}
