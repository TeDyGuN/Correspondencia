@extends('Plantilla/plantilla')

@section('content')


    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Modal title</h4>
          </div>
          <div class="modal-body">
              <input type="text" name="codigo" id="codigo" disabled>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div id="ribbon">
        <ol class="breadcrumb">
            <li>Inicio</li><li>Correspondencia Recibida</li>
        </ol>
    </div>
    <div class="container" style="margin-top:20px;">

      <button type="button" class="btn btn-success" name="button">Agregar</button>
      <table class="table table-striped table-bordered" id="users-table">
          <thead>
          <tr>
              <th>Codigo</th>
              <th>Adjunto</th>
              <th>Fecha</th>
              <th>Remitente</th>
              <th>Referencia</th>
              <th>Estado</th>
              <th>Accion</th>
          </tr>
          </thead>
      </table>
    </div>

@stop

@push('scripts')
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>

<script src="{{ asset('/vendor/datatables/buttons.server-side.js') }}"></script>
<script>
    $(function() {
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: 'https://datatables.yajrabox.com/eloquent/add-edit-remove-column-data',
            ajax: '{!! route('recibido.data') !!}',
            columns: [
                { data: 'codigo', name: 'codigo' },
                { data: 'adjunto', name: 'adjunto' },
                { data: 'f_creacion', name: 'f_creacion' },
                { data: 'remitente', name: 'remitente' },
                { data: 'referencia', name: 'referencia' },
                { data: 'estado', name: 'estado' },
                { data: 'action', name: 'action', orderable: false, searchable: false}
            ],
            dom: 'Bfrtip',
            buttons: [
                'copy'
            ],
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            }

        });
        $('#users-table tbody').on('click', 'td>a.btnbtn', function () {
                        // var table = $('#users-table').DataTable();
                        // console.log( table.row(9).data() );
                        //
                        // event.preventDefault();
               // var row = $(this).parents('tr');
               var id = $(this).attr('id') ;
               var form = $('#form-ver');
               var url = form.attr('action').replace(':USER_ID', id);
               console.log(url);
               // var data = form.serialize();
               // row.fadeOut();
               // $.post(url, data, function(result)
               // {
               //     alert(result);
               // }).fail(function()
               // {
               //     alert('El Usuario No fue Eliminado');
               //     row.show();
               // });
           });
        // $('#myModal').on('show.bs.modal', function (e) {
        //
        //     console.log( $(this).attr('id') );
        //   $('#codigo').val('sads');
        // });
    });
</script>
@endpush
