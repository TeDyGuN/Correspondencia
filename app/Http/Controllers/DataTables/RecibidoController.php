<?php

namespace App\Http\Controllers\DataTables;
use App\Http\Controllers\Controller;
use App\Recibidos;
use App\User;
use Yajra\Datatables\Services\DataTable;
use Yajra\Datatables\Facades\Datatables;
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
    $rec = Recibidos::select();
    return Datatables::of($rec)
    ->addColumn('action', function ($r) {
                    return '<a id='.$r->id.' class="btnbtn btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-plus"></i>Ver</a>
                    <form id="form-ver" role="form" method="POST" action="{{ route(\'users.destroy\', \':USER_ID\') }}">
                        <input name="_method" type="hidden"  value="DELETE">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                    </form>
                    <a href="#" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-wrench"></i> Modificar</a>
                    <a href="#" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-sort"></i> Hoja de Ruta</a>';
                })

      ->make(true);
  }

}
