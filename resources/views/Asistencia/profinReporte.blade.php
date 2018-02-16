@extends('Plantilla/plantilla')

@section('content')

    <div id="ribbon">
        <ol class="breadcrumb">
            <li><a href="{{ url("home")}}">Inicio</a></li>
            <li>Reporte de Asistencia</li>
        </ol>
    </div>
    <div class="container" style="margin-top:20px;">
      <h2>Reporte de Asistencia</h2>
      <a href="{{ url('reporte/asistenciaProfin').'/'. $anio .'/'. $mes}}" target="_blank">
        <button type="" class="btn btn-primary">
          <i class="fa fa-btn fa-user"></i> Imprimir
        </button>
      </a>
      <table class="table table-striped table-bordered" id="enviadas-table">
          <thead>
          
          <tr class="info">
              <th>Usuario</th>
              <th>Fecha</th>
              <th>Entrada</th>
              <th>Alm. Inicio</th>
              <th>Alm. Fin</th>
              <th>Salida</th>
              <th>Justificativo</th>
              <th>Atraso</th>
          </tr>
          </thead>
          <tbody id="datos">
            @foreach ($reporte as $r)

              {{-- @if ( $r->justificativo != '')
                <tr class="warning">
                  <td>{{ $r->fecha }}</td>
                  <td>{{ $r->hora_in }}</td>
                  <td>{{ $r->hora_alm_in }}</td>
                  <td>{{ $r->hora_alm_out }}</td>
                  <td>{{ $r->hora_out }}</td>
                  <td>{{ $r->justificativo }}</td>
                  <td>{{ $r->atraso }}</td>
                </tr>
              @endif --}}
              @if ($r->atraso != '00:00:00')
                <tr class="danger">
                  <td>{{ $r->nombre }} {{ $r->paterno }}</td>
                  <td>{{ $r->fecha }}</td>
                  @if ($r->hora_in != '00:00:00')
                    <td>{{ $r->hora_in }}</td>
                  @else
                    <td>{{ $r->justificativo }}</td>
                  @endif

                  @if ($r->hora_alm_in != '00:00:00')
                    <td>{{ $r->hora_alm_in }}</td>
                  @else
                    <td>{{ $r->justificativo }}</td>
                  @endif

                  @if ($r->hora_alm_out != '00:00:00')
                    <td>{{ $r->hora_alm_out }}</td>
                  @else
                    <td>{{ $r->justificativo }}</td>
                  @endif

                  @if ($r->hora_out != '00:00:00')
                    <td>{{ $r->hora_out }}</td>
                  @else
                    <td>{{ $r->justificativo }}</td>
                  @endif
                  <td>{{ $r->justificativo }}</td>
                  <td>{{ $r->atraso }}</td>
                </tr>
              @else
                <tr>
                  <td>{{ $r->nombre }} {{ $r->paterno }}</td>
                  <td>{{ $r->fecha }}</td>
                  @if ($r->hora_in != '00:00:00')
                    <td>{{ $r->hora_in }}</td>
                  @else
                    <td>{{ $r->justificativo }}</td>
                  @endif

                  @if ($r->hora_alm_in != '00:00:00')
                    <td>{{ $r->hora_alm_in }}</td>
                  @else
                    <td>{{ $r->justificativo }}</td>
                  @endif

                  @if ($r->hora_alm_out != '00:00:00')
                    <td>{{ $r->hora_alm_out }}</td>
                  @else
                    <td>{{ $r->justificativo }}</td>
                  @endif

                  @if ($r->hora_out != '00:00:00')
                    <td>{{ $r->hora_out }}</td>
                  @else
                    <td>{{ $r->justificativo }}</td>
                  @endif
                  <td>{{ $r->justificativo }}</td>
                  <td></td>
                </tr>
              @endif

            @endforeach
          </tbody>
      </table>

      {{ $reporte->links() }}
    </div>
@stop
