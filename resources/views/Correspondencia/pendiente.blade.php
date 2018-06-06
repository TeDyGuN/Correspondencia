@extends('Plantilla/plantilla')

@section('content')
    <div id="ribbon">
        <ol class="breadcrumb">
            <li><a href="{{ url("home")}}">Inicio</a></li>
            <li>Correspondencia Recibida</li>
        </ol>
    </div>
    <div class="container" style="margin-top:20px;">
      <table class="table table-striped table-bordered" id="pend-table">
          <thead>
          <tr>
              <th>Codigo</th>
              <th>Tipo</th>
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
        $('#pend-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: 'https://datatables.yajrabox.com/eloquent/add-edit-remove-column-data',
            ajax: '{!! route('pendientes.data') !!}',
            columns: [
                { data: 'codigo', name: 'codigo', width: '5%'},
                { data: 'tipo', name: 'tipo' , width: '10%'},
                { data: 'f_creacion', name: 'f_creacion' , width: '10%'},
                { data: 'remitente', name: 'remitente' , width: '20%'},
                { data: 'referencia', name: 'referencia' , width: '30%'},
                { data: 'estado', name: 'estado' , width: '10%'},
                { data: 'action', name: 'action', orderable: false, searchable: false, width: '15%'}
            ],
            dom: 'Bfrtip',
            buttons: [
                'copy'
            ],
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            }

        });
        // $('#users-table tbody').on('click', 'td>a.btnbtn', function () {
        //   event.preventDefault();
        //   var id = $(this).attr('id') ;
        //
        //   var url =  "{{ url('correspondencia/datos/$(id)')}}".replace('$(id)', id);
        //   console.log(url);
        //   $.get(url, function(data, status)
        //   {
        //       var ps = data[0].remitente;
        //       $('#rem').text(ps);
        //       $('#titulo').text(data[0].codigo);
        //       $('#ref').text(data[0].referencia);
        //       $('#estado').text(data[0].estado);
        //       $('#tipo').text(data[0].tipo);
        //       $('#fecha').text(data[0].f_creacion);
        //       $('#file').text(data[0].adjunto);
        //       $('#derivado').text(data[0].nombre + " " + data[0].paterno);
        //       $('#obs').text(data[0].observacion);
        //   }).fail(function()
        //   {
        //      console.log("Error");
        //   });
        // });

    });
</script>
@endpush
