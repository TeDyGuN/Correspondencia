@extends('Plantilla/plantilla')

@section('content')

    <div id="ribbon">
        <ol class="breadcrumb">
            <li><a href="{{ url("home")}}">Inicio</a></li>
            <li>Reporte de Asistencia</li>
        </ol>
    </div>
    <div class="container">
      <div class="panel panel-default" style="margin-top:20px;">
        <div class="panel-heading">
            <h3 class="panel-title">Registrar Vacación</h3>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" target="_blank" enctype="multipart/form-data"  method="POST" action="{{ url('vacacion/save') }}">
                {{ csrf_field() }}
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> Hay problemas con tus Entradas<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group">
                    <label class="col-md-4 control-label colorazul">Usuario</label>
                    <div class="col-md-6">
                        <select class="form-control" name="usuario" id="usuario">
                            @foreach($users as $u)
                                <option value="{{ $u->id }}">{{ $u->nombre }} {{ $u->paterno }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="nombres" class="col-md-4 control-label">De: </label>
                    <div class="col-md-6">
                        <input type="date" class="form-control" id="de" name="de"  required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nombres" class="col-md-4 control-label">Hasta: </label>
                    <div class="col-md-6">
                        <input type="date" class="form-control" id="hasta" name="hasta"  required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nombres" class="col-md-4 control-label">Duracion (Dias): </label>
                    <div class="col-md-6">
                        <input type="decimal" class="form-control" id="duracion" name="duracion"  required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nombres" class="col-md-4 control-label">Ultimo dia de trabajo: </label>
                    <div class="col-md-6">
                        <input type="date" class="form-control" id="ultimo" name="ultimo"  required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nombres" class="col-md-4 control-label">Dia de reanudacion de trabajo: </label>
                    <div class="col-md-6">
                        <input type="date" class="form-control" id="reanudacion" name="reanudacion"  required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="otros" class="col-md-4 control-label">Observaciones</label>
                    <div class="col-md-6">
                        <textarea class="form-control" id="obs" name="obs"  required></textarea>
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">Control:</label>
                  <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                          <th>Vacaciones Pendientes de uso</th>
                          <td id="v_pend"></td>
                          <td>Dias</td>
                        </tr>
                        <tr>
                          <th>Vacaciones Solicitadas</th>
                          <td id="v_sol">0</td>
                          <td>Dias</td>
                        </tr>
                        <tr>
                          <th>Saldo de Vacaciones</th>
                          <td id="v_saldo"></td>
                          <td>Dias</td>
                        </tr>
                    </table>
                  </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary btn-block">
                            Registrar e Imprimir
                        </button>
                    </div>
                </div>
                {{ $success = Session::get('success')}}
                @if ($success)
                    <div class="alert alert-success">
                        <strong>!!Felicidades!!</strong> Se subio la planilla correctamente<br><br>
                    </div>
                @endif
            </form>
        </div>
      </div>
    </div>

@stop

@push('scripts')

  <script>
      $(function() {

        var usuarios = {!! $users !!};
        $('#v_pend').text(usuarios[0]['v_saldo']);
        $('#v_saldo').text(usuarios[0]['v_saldo']);
        $('#duracion').change(function(){
          var dur = $('#duracion').val();
          var pend = $('#v_pend').text();4
          $('#v_sol').text(dur);
          var saldo = pend - dur;
          $('#v_saldo').text(saldo);
        });
        $('#usuario').change(function(){
           var id = $( "#usuario" ).val();
           $('#v_pend').text(usuarios[id-1]['v_saldo']);
           $('#v_saldo').text(usuarios[id-1]['v_saldo']);
        });

      });
  </script>
@endpush
