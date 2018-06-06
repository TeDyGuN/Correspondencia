<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>S.A.D.I. V2</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" media="all">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous" media="all">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <style>
    @page {
      size: A4 portrait;
    }
    </style>
  </head>
  <body>
    <img src="{{ asset('img/logo_entrada.png')}}" width="180px"alt="" class="img img-responsive pull-left">
    <h2 class="text-center">Reporte Asistencia</h2>
    <h5 class="text-center">Fecha de Reporte: {{$mytime = Carbon\Carbon::now()}}</h5>
    <div class="container-fluid">
      <div class="col-md-6" style="margin-top:20px;">
        <table class="table table-bordered table-striped">
          <tr>
            <th>Nombre</th>
            <td>{{Auth::user()->nombre }} {{ Auth::user()->paterno }}</td>
          </tr>
          <tr>
            <th>Cedula</th>
            <td>{{Auth::user()->ci }}</td>
          </tr>
          <tr>
            <th>Cargo</th>
            <td>{{Auth::user()->cargo }} </td>
          </tr>
          <tr>
            <th>Fecha Reportada</th>
            <td>{{ $mes }} / {{ $anio }}</td>
          </tr>
        </table>
      </div>
      <div class="col-md-6">

      </div>
    </div>

    <table class="table table-striped table-bordered" id="enviadas-table">
        <thead>
        <tr class="info">
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
  </body>
</html>
