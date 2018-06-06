@extends('Plantilla/plantilla')

@section('content')

    <div id="ribbon">
        <ol class="breadcrumb">
            <li><a href="{{ url("home")}}">Inicio</a></li>
            <li>Control de Atrasos</li>
        </ol>
    </div>
    <div class="container" style="margin-top:20px;">
      <h2>Control de Atrasos</h2>
      <table class="table table-striped table-bordered" id="enviadas-table">
          <thead>
          <tr class="info">
              <th>Usuario</th>
              <th>Fecha</th>
              <th>Hora Llegada</th>
              <th>Atraso (Minutos)</th>
              <th>Acción</th>
          </tr>
          </thead>
          <tbody id="datos">
            <?php $saldo = 0.0;  ?>
            @foreach ($reporte as $r)
              <tr>
                <td>{{ $r->nombre}} {{ $r->paterno }}</td>
                <td>{{ $carbon = Carbon\Carbon::parse($r->fecha)->format('d/m/Y') }} </td>

                <td>{{ $r->hora_in }}</td>
                <td>{{ $r->atraso }}</td>
                <td>
                  <a href="{{ url('reporte/atraso/' . $r->id) }}" target="_blank">
                    <button type="" class="btn btn-primary">
                      <i class="fa fa-btn fa-user"></i> Generar Reporte
                    </button>
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
      </table>

    </div>
@stop
