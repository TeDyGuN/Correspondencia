@extends('Plantilla/plantilla')

@section('content')


    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title text-center" id="titulo"></h4>
          </div>
          <div class="modal-body">
            <table class="table table-bordered table-striped">
              <tr>
                <th>Remitente</th>
                <td id="rem"></td>
              </tr>
              <tr>
                <th>Referencia</th>
                <td id="ref"></td>
              </tr>
              <tr>
                <th>Tipo</th>
                <td id="tipo"></td>
              </tr>
              <tr>
                <th>Estado</th>
                <td id="estado"></td>
              </tr>
              <tr>
                <th>Fecha</th>
                <td id="fecha"></td>
              </tr>
              <tr>
                <th>Archivo</th>
                <td id="file"></td>
              </tr>
              <tr>
                <th>Derivado a:</th>
                <td id="derivado"></td>
              </tr>
              <tr>
                <th>Observacion</th>
                <td id="obs"></td>
              </tr>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <div class="modal fade" id="creacion" tabindex="-1" role="dialog" aria-labelledby="creacionLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title text-center" >Creacion de Correspondencia</h4>
          </div>
          <div class="modal-body">
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
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('correspondencia/nuevo') }}" enctype="multipart/form-data"  id="form-nuevo">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="c_tipo" class="col-md-4 control-label">Tipo Correspondencia: </label>

                            <div class="col-md-6">
                              <select class="form-control" name="c_tipo">
                                  <option value="Carta">Carta</option>
                                  <option value="Factura">Factura</option>
                                  <option value="Recibo">Recibo</option>
                                  <option value="Otros">Otros</option>
                              </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="c_fecha" class="col-md-4 control-label">Fecha de Origen</label>

                            <div class="col-md-6">
                                <input id="c_fecha" type="date" class="form-control" name="c_fecha">

                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('c_remitente') ? ' has-error' : '' }}">
                            <label for="c_remitente" class="col-md-4 control-label">Remitente</label>

                            <div class="col-md-6">
                                <input id="c_remitente" type="text" class="form-control" name="c_remitente" value="{{ old('c_remitente') }}">

                                @if ($errors->has('c_remitente'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('c_remitente') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('c_referencia') ? ' has-error' : '' }}">
                            <label for="c_referencia" class="col-md-4 control-label">Referencia</label>

                            <div class="col-md-6">
                                <textarea id="c_referencia" type="" class="form-control" name="c_referencia" value="{{ old('c_referencia') }}" rows="3">
                                  </textarea>

                                @if ($errors->has('c_referencia'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('c_referencia') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('c_adjunto') ? ' has-error' : '' }}">
                            <label for="c_adjunto" class="col-md-4 control-label">Adjunto</label>

                            <div class="col-md-6">
                                <input id="c_adjunto" type="text" class="form-control" name="c_adjunto" value="{{ old('c_adjunto') }}">

                                @if ($errors->has('c_adjunto'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('c_adjunto') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="c_estado" class="col-md-4 control-label">Estado </label>

                            <div class="col-md-6">
                              <select class="form-control" name="c_estado">
                                  <option value="Abierto">Abierto</option>
                                  <option value="Cerrado">Cerrado</option>
                              </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="c_documento" class="col-md-4 control-label">Documento </label>

                            <div class="col-md-6">
                               <input type="file" required name="archivo" id="archivo" name="archivo"/>
                            </div>

                        </div>
                        <div class="form-group{{ $errors->has('c_obs') ? ' has-error' : '' }}">
                            <label for="c_obs" class="col-md-4 control-label">Observacion</label>
                            <div class="col-md-6">
                                <input id="c_obs" type="text" class="form-control" name="c_obs" value="{{ old('c_obs') }}">

                                @if ($errors->has('c_obs'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('c_obs') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="c_der" class="col-md-4 control-label">Derivado a: </label>

                            <div class="col-md-6">
                              <select class="form-control" name="c_der" id="c_der">
                              </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="c_accion" class="col-md-4 control-label">Accion </label>

                            <div class="col-md-6">
                              <select class="form-control" name="c_accion">
                                  <option value="1">Revisar Informacion</option>
                                  <option value="2">Derivar</option>
                                  <option value="3">Revisar Consultoria</option>
                                  <option value="4">Registrar Correspondencia</option>
                                  <option value="5">Archivar</option>
                              </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary btn-block" id="btn-nuevo">
                                    <i class="fa fa-btn fa-user"></i> Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                <br><br>
                {{$success = Session::get('success')}}
                @if ($success)
                    <div class="alert alert-success">
                        <strong>!!Felicidades!!</strong>Se Creo el usuario Correctamente <br><br>
                    </div>
                @endif
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <div id="ribbon">
        <ol class="breadcrumb">
            <li>Inicio</li><li>Correspondencia Recibida</li>
        </ol>
    </div>
    <div class="container" style="margin-top:20px;">

      <button type="button" class="btn btn-success" id="btn-creacion" data-toggle="modal" data-target="#creacion" name="button">Agregar</button>
      <table class="table table-striped table-bordered" id="users-table">
          <thead>
          <tr>
              <th>Codigo</th>
              <th>Adjunto</th>
              <th>Fecha</th>
              <th>Remitente</th>
              <th>Referencia</th>
              <th>Estado</th>
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
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: 'https://datatables.yajrabox.com/eloquent/add-edit-remove-column-data',
            ajax: '{!! route('recibido.data') !!}',
            columns: [
                { data: 'codigo', name: 'codigo' },
                { data: 'adjunto', name: 'adjunto' },
                { data: 'f_creacion', name: 'f_creacion' },
                { data: 'remitente', name: 'remitente' },
                { data: 'referencia', name: 'referencia' },
                { data: 'estado', name: 'estado' },
                { data: 'action', name: 'action', orderable: false, searchable: false}
            ],
            dom: 'Bfrtip',
            buttons: [
                'copy'
            ],
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            }

        });
        $('#users-table tbody').on('click', 'td>a.btnbtn', function () {
          event.preventDefault();
          var id = $(this).attr('id') ;

          var url =  "{{ url('correspondencia/datos/$(id)')}}".replace('$(id)', id);
          console.log(url);
          $.get(url, function(data, status)
          {
              var ps = data[0].remitente;
              $('#rem').text(ps);
              $('#titulo').text(data[0].codigo);
              $('#ref').text(data[0].referencia);
              $('#estado').text(data[0].estado);
              $('#tipo').text(data[0].tipo);
              $('#fecha').text(data[0].f_creacion);
              $('#file').text(data[0].file);
              $('#derivado').text(data[0].nombre + " " + data[0].paterno);
              $('#obs').text(data[0].observacion);
             console.log(data);
          }).fail(function()
          {
             console.log("Error");
          });
        });
        $('#btn-creacion').on('click', function () {
          event.preventDefault();
          // var id = $(this).attr('id') ;
          //
          var url =  "{{ url('correspondencia/usuarios')}}";
          // console.log(url);
          $.get(url, function(data, status)
          {
            var $el = $("#c_der");
            $el.empty(); // remove old options
            $.each(data, function(key,value) {
              $el.append($("<option></option>")
                 .attr("value", key+1).text(value.nombre + " " + value.paterno));
            });
              // var ps = data[0].remitente;
              // $('#rem').text(ps);
              // $('#titulo').text(data[0].codigo);
              // $('#ref').text(data[0].referencia);
              // $('#estado').text(data[0].estado);
              // $('#tipo').text(data[0].tipo);
              // $('#fecha').text(data[0].f_creacion);
              // $('#file').text(data[0].file);
              // $('#derivado').text(data[0].nombre + " " + data[0].paterno);
              // $('#obs').text(data[0].observacion);
             console.log(data);
          }).fail(function()
          {
             console.log("Error");
          });
        });
        // $('#btn-nuevo').on('click', function(){
        //   event.preventDefault();
        //   var form = $('#form-nuevo');
        //   var data = form.serialize();
        //   //var formData = new FormData($('#form-nuevo')[0]);
        //   $.post(url, data, function(result)
        //   {
        //       console.log(result);
        //   }).fail(function()
        //   {
        //       console.log('El Usuario No fue Eliminado');
        //   });
        //
        // })
        // $('#myModal').on('show.bs.modal', function (e) {
        //
        //     console.log( $(this).attr('id') );
        //   $('#codigo').val('sads');
        // });
    });
</script>
@endpush
