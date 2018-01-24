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
                    return '<a id='.$r->id.'  class="btnbtn btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-plus"></i>Ver</a>
                    <a id="e'.$r->id.'" class="btneliminar btn btn-xs btn-warning" data-toggle="modal" data-target="#mod_eliminar"><i class="glyphicon glyphicon-wrench"></i> Eliminar</a>
                    <a href="' . url('/correspondencia/ruta/'.$r->id ) .'" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-sort"></i> Hoja de Ruta</a>';
                })

      ->make(true);
  }

}
