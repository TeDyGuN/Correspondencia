<?php

namespace App\DataTables;

use App\Recibidos;
use App\User;
use Yajra\Datatables\Services\DataTable;

class RecibidosDataTable extends DataTable
{
    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        // return $this->datatables
        //     ->eloquent($this->query())
        //     ->addColumn('action', 'path.to.action.view')
        //     ->make(true);

        return $this->datatables
      		    ->eloquent($this->query())
      		    ->make(true);
          }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
      $codigos = Recibidos::select();
      return $this->applyScopes($codigos);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
               ->columns([
                 'codigo',
                 'adjunto',
                 'f_creacion',
                 'remitente',
                 'referencia',
                 'estado'
               ])
               ->parameters([
                 'dom' => 'Bfrtip',
                 'buttons' => ['reload'],
               ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id',
            // add your columns
            'created_at',
            'updated_at',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'recibidosdatatables_' . time();
    }
}
