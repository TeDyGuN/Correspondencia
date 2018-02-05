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
    <h2 class="text-center">Reporte Hoja de Ruta</h2>
    <h5 class="text-center">Fecha: {{$mytime = Carbon\Carbon::now()}}</h5>
    <h3>Correspondencia</h3>
    <table class="table table-bordered table-striped">
      <tr>
        <th>Codigo</th>
        <td>{{ $aso->codigo }}</td>
      </tr>
      <tr>
        <th>Remitente</th>
        <td>{{ $aso->remitente }}</td>
      </tr>
      <tr>
        <th>Referencia</th>
        <td>{{ $aso->referencia }}</td>
      </tr>
      <tr>
        <th>Tipo</th>
        <td>{{ $aso->tipo }}</td>
      </tr>
      <tr>
        <th>Estado</th>
        <td >{{ $aso->estado }}</td>
      </tr>
      <tr>
        <th>Fecha</th>
        <td>{{ $aso->f_creacion }}</td>
      </tr>
      <tr>
        <th>Observacion</th>
        <td >{{ $aso->observacion }}</td>
      </tr>
    </table>
    <h3>Hoja de Ruta</h3>
    <table class="table  table-bordered table-striped">
        <thead>
          <tr style="font-size: 14px;" class="info">
            <th>Usuario</th>
            <th>Accion</th>
            <th>Fecha</th>
            <th>Derivado a</th>
            <th>Seguimiento</th>
            <th>Estado</th>
          </tr>
        </thead>
        <tbody>

          @foreach($procesos as $p)
             <tr>
                 <th>{{ $p->nnombre. ' '. $p->npaterno }}</th>
                 <th>{{ $p->accion }}</th>
                 <th>{{ $p->fecha }}</th>
                 <th>{{ $p->mnombre. ' '. $p->mpaterno }}</th>
                 <th>{{ $p->referencia }}</th>
                 <th>{{ $p->estado }}</th>

             </tr>
         @endforeach
        </tbody>
    </table>
  </body>
</html>
