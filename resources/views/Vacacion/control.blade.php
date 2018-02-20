@extends('Plantilla/plantilla')

@section('content')

    <div id="ribbon">
        <ol class="breadcrumb">
            <li><a href="{{ url("home")}}">Inicio</a></li>
            <li>Control de Vacación</li>
        </ol>
    </div>
    <div class="container" style="margin-top:20px;">
      <h2>Reporte de Asistencia</h2>
      <a href="{{ url('reporte/control') }}" target="_blank">
        <button type="" class="btn btn-primary">
          <i class="fa fa-btn fa-user"></i> Imprimir
        </button>
      </a>
      <table class="table table-striped table-bordered" id="enviadas-table">
          <thead>
          <tr class="info">
              <th>Fecha</th>
              <th>N° Boleta</th>
              <th>Especificación</th>
              <th>Desde</th>
              <th>Hasta</th>
              <th>Asignada</th>
              <th>Utilizada</th>
              <th>Saldo</th>
              <th>Observacion</th>
          </tr>
          </thead>
          <tbody id="datos">
            <?php $saldo = 0.0;  ?>
            @foreach ($reporte as $r)
              @if ($r->tipo == 'Asignacion')
                <tr>

                  <?php $saldo = $saldo + $r->duracion;  ?>
                  <td>{{ $carbon = Carbon\Carbon::parse($r->created_at)->format('d/m/Y') }} </td>
                  <td>{{ $r->boleta }}</td>
                  <td colspan="3" class="text-center">Vacación Asignada</td>
                  <td>{{ $r->duracion }}</td>
                  <td>0</td>
                  <td>{{ $saldo }}</td>
                  <td>{{ $r->observacion }}</td>
                </tr>
              @elseif ($r->tipo == 'Vacacion')
                <tr>

                  <?php $saldo = $saldo - $r->duracion;  ?>
                  <td>{{ $carbon = Carbon\Carbon::parse($r->created_at)->format('d/m/Y') }} </td>
                  <td>{{ $r->boleta }}</td>
                  <td>Vacación Solicitada</td>
                  <td>{{ $r->inicio }}</td>
                  <td>{{ $r->fin }}</td>
                  <td>0</td>
                  <td>{{ $r->duracion }}</td>
                  <td>{{ $saldo }}</td>
                  <td>{{ $r->observacion }}</td>
                </tr>
              @elseif ($r->tipo == 'Atraso')
                <tr>

                  <?php $saldo = $saldo - $r->duracion;  ?>
                  <td>{{ $carbon = Carbon\Carbon::parse($r->created_at)->format('d/m/Y') }} </td>
                  <td>{{ $r->boleta }}</td>
                  <td colspan="3" class="text-center">Atraso</td>
                  <td>0</td>
                  <td>0.5</td>
                  <td>{{ $saldo }}</td>
                  <td>{{ $r->observacion }}</td>
                </tr>
              @endif

            @endforeach
          </tbody>
      </table>

    </div>
@stop
