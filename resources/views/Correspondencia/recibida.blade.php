@extends('Plantilla/plantilla')

@section('content')
    <div id="ribbon">
        <ol class="breadcrumb">
            <li>Inicio</li><li>Correspondencia Recibida</li>
        </ol>
    </div>
    <div class="container" style="margin-top: 30px;">
        <div class="row" >
          {!! $dataTable->table() !!}
        </div>
    </div>

@endsection

@push('scripts')
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('/js/buttons.server-side.js') }}"></script>
{!! $dataTable->scripts() !!}
@endpush
