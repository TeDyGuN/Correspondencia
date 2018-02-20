<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>S.A.D.I. V2</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" media="all">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous" media="all">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <style>
    @media print {
      @page {
        margin: 0;
        size: A4 landscape;
      }
      body {
        margin: 1.6cm;

      }
      .table>tbody>tr>td,
      .table>tbody>tr>th,
      .table>tfoot>tr>td,
      .table>tfoot>tr>th,
      .table>thead>tr>td,
      .table>thead>tr>th {
        border-top: 0 !important;
      }
    }
    </style>
  </head>
  <body>
      <div class="">
        <img src="{{ asset('img/logo_entrada.png')}}" width="250px" alt="" class="img" style="position:absolute;">

        <h4 class="text-center" style="padding: 5px;text-align: right;"><strong>Fecha:</strong> {{$mytime =  Carbon\Carbon::now()->format('d/m/Y')}}</h5>

      </div>
      <div width="100%" style="margin-top:70px;">
        <h3 class="text-center" style="text-decoration: underline;"><strong>Reporte de Control de Vacación</strong></h3>
      </div>
    </div>
    <div class="">
      <p><strong>Nombre: </strong> {{ Auth::user()->nombre . ' '. Auth::user()->paterno}}</p>
    </div>
    <div class="">
      {{-- <p style="text-decoration: underline;"><strong>Dias de Asignacion</strong></p>
      <table width="50%" style="margin-bottom: 10px;">
        <tr>
          <td width="20%"><strong>Duración (Días):</strong></td>
          <td width="15%"> {{ $reporte[0]->duracion }}</td>
        </tr>
      </table> --}}
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

    <div style="line-height: 0.5;">
        <br style="line-height: normal;"><br style="line-height: normal;"><br style="line-height: normal;"><br style="line-height: normal;"><br style="line-height: normal;">
        <p class="text-center">---------------------------------------------</p>
        <p class="text-center"> {{ Auth::user()->nombre . ' '. Auth::user()->paterno }}</p>
        <br style="line-height: normal;"><br style="line-height: normal;"><br style="line-height: normal;"><br style="line-height: normal;"><br style="line-height: normal;">
        <p class="text-center">-------------------------------</p>
        <p class="text-center"><strong>Vo Vo. Administración</strong></p>
        <br style="line-height: normal;"><br style="line-height: normal;"><br style="line-height: normal;"><br style="line-height: normal;"><br style="line-height: normal;">


    </div>
  </body>
</html>
