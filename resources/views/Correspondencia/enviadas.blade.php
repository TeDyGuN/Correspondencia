@extends('Plantilla/plantilla')

@section('content')

    <div id="ribbon">
        <ol class="breadcrumb">
            <li><a href="{{ url("home")}}">Inicio</a></li>
            <li>Correspondencia Enviada</li>
        </ol>
    </div>
    <div class="container" style="margin-top:20px;">

      <table class="table table-striped table-bordered" id="enviadas-table">
          <thead>
          <tr>
              <th>Codigo</th>
              <th>Tipo</th>
              <th>Responsable</th>
              <th>Dirigido a:</th>
              <th>Referencia</th>
              <th>Fecha</th>
              <th>Adjunto</th>
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
        $('#enviadas-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: 'https://datatables.yajrabox.com/eloquent/add-edit-remove-column-data',
            ajax: '{!! route('enviado.data') !!}',
            columns: [
                { data: 'codigo', name: 'codigo', width: '5%'},
                { data: 'tipo', name: 'tipo' , width: '10%'},
                { data: 'nombre', name: 'nombre' , width: '10%'},
                { data: 'emitente', name: 'emitente' , width: '20%'},
                { data: 'referencia', name: 'referencia' , width: '20%'},
                { data: 'created_at', name: 'created_at' , width: '10%'},
                { data: 'adjunto', name: 'adjunto' , width: '10%'},
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


    });
</script>
@endpush
