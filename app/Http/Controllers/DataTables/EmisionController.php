<?php

namespace App\Http\Controllers\DataTables;
use App\Http\Controllers\Controller;
use App\Recibidos;
use App\Enviado;
use App\User;
use Yajra\Datatables\Services\DataTable;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Redirect;

class EmisionController extends Controller
{
  public function getIndex()
  {
    return view('Correspondencia.enviadas');
  }

  /**
  * Process datatables ajax request.
  *
  * @return \Illuminate\Http\JsonResponse
  */
  public function sendData()
  {
    $rec = Enviado::join('users as u', 'enviados.id_user_destino', 'u.id')
                    ->where('u.id', Auth::id())
                    ->orderBy('id_enviado', 'desc')
                    ->select('enviados.codigo as codigo', 'enviados.tipo as tipo', 'u.nombre as nombre', 'enviados.emitente as emitente',
                    'enviados.referencia as referencia', 'enviados.created_at as created_at', 'enviados.adjunto as adjunto',
                    'enviados.id as id', 'enviados.id_enviado as id_enviado');
    return Datatables::of($rec)
    ->addColumn('action', function ($r) {
                    return '<a id="e'.$r->id.'" class="btneliminar btn btn-xs btn-warning" data-toggle="tooltip" data-placement="buttom" title="No Disponible"><i class="glyphicon glyphicon-wrench"></i> Eliminar</a>';
                })
    ->make(true);
  }
  public function getIndexG()
  {
    return view('Correspondencia.enviadasG');
  }

  /**
  * Process datatables ajax request.
  *
  * @return \Illuminate\Http\JsonResponse
  */
  public function sendDataG()
  {
    $rec = Enviado::join('users as u', 'enviados.id_user_destino', 'u.id')
                    ->orderBy('id_enviado', 'desc')
                    ->select('enviados.codigo as codigo', 'enviados.tipo as tipo', 'u.nombre as nombre', 'enviados.emitente as emitente',
                    'enviados.referencia as referencia', 'enviados.created_at as created_at', 'enviados.adjunto as adjunto',
                    'enviados.id as id', 'enviados.id_enviado as id_enviado');
    return Datatables::of($rec)
    ->addColumn('action', function ($r) {
                    return '<a id="e'.$r->id.'" class="btneliminar btn btn-xs btn-warning" data-toggle="modal" data-target="#mod_eliminar"><i class="glyphicon glyphicon-wrench"></i> Eliminar</a>';
                })
    ->make(true);
  }

}
