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
        size: A4 portrait;
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
        <h3 class="text-center" style="text-decoration: underline;"><strong>FORMULARIO DE ASIGNACION</strong></h3>
      </div>
    </div>
    <div class="">
      <p><strong>Boleta N°  </strong> {{ $reporte[0]->boleta }}</p>
      <p><strong>Nombre: </strong> {{ $reporte[0]->nnombre . ' '. $reporte[0]->npaterno}}</p>
    </div>
    <div class="">
      <p style="text-decoration: underline;"><strong>Dias de Asignacion</strong></p>
      <table width="50%" style="margin-bottom: 10px;">
        <tr>
          <td width="20%"><strong>Duración (Días):</strong></td>
          <td width="15%"> {{ $reporte[0]->duracion }}</td>
        </tr>
      </table>
      <p style="text-decoration: underline;"><strong>Control Vacaciones</strong></p>
      <table width="50%" class="table">
          <tr style="margin-bottom:10px;">
            <th>Vacaciones Pendientes de uso</th>
            <td id="v_pend">{{ $reporte[0]->v_saldo - $reporte[0]->duracion }} Días</td>
          </tr>
          <tr style="margin-bottom:10px;">
            <th>Dias Asignados</th>
            <td id="v_sol">{{ $reporte[0]->duracion }} Días</td>
          </tr>
          <tr style="margin-bottom:10px;">
            <th>Saldo de Vacaciones</th>
            <td id="v_saldo">{{ $reporte[0]->v_saldo }} Días</td>
          </tr>
      </table>
      <hr>
      <p style="text-decoration: underline;"><strong>OBSERVACIONES:</strong></p>
      <p>{{ $reporte[0]->observacion }}</p>
      <br><br><br>

    </div>

    <div style="line-height: 0.5;">
        <p class="text-center">---------------------------------------------</p>
        <p class="text-center"> {{ $reporte[0]->nnombre . ' '. $reporte[0]->npaterno}}</p>
        <br style="line-height: normal;"><br style="line-height: normal;"><br style="line-height: normal;"><br style="line-height: normal;"><br style="line-height: normal;">
        <p class="text-center">-------------------------------</p>
        <p class="text-center"><strong>Andrea Rivadeneyra</strong></p>
        <p class="text-center">Verificación de Vacaciones</p>
        <br style="line-height: normal;"><br style="line-height: normal;"><br style="line-height: normal;"><br style="line-height: normal;"><br style="line-height: normal;">
        <p class="text-center">-------------------------------</p>
        <p class="text-center"><strong>{{ $reporte[0]->nombre . ' '. $reporte[0]->paterno}}</strong></p>
        <p class="text-center">Jefe Inmediato Superior</p>

    </div>
  </body>
</html>
