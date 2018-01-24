@extends('Plantilla/plantilla')

@section('content')


    {{-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
    </div><!-- /.modal --> --}}
    <div class="modal fade" id="creacion" tabindex="-1" role="dialog" aria-labelledby="creacionLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title text-center" >Creacion de Correspondencia Enviada</h4>
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
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('enviada/nuevo') }}" enctype="multipart/form-data"  id="form-nuevo">
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
                        <div class="form-group {{ $errors->has('c_remitente') ? ' has-error' : '' }}">
                            <label for="c_remitente" class="col-md-4 control-label">Dirigido a</label>

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
                            <label for="c_der" class="col-md-4 control-label">Responsable</label>

                            <div class="col-md-6">
                              <select class="form-control" name="c_der" id="c_der">
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
    <div class="modal fade" id="mod_eliminar" tabindex="-1" role="dialog" aria-labelledby="creacionLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title text-center" >Eliminar Correspondencia</h4>
          </div>
          <div class="modal-body">
            <input name="_method" type="hidden"  value="DELETE" id="input_eliminar">
              <form class="form-horizontal" id="form-delete" role="form" method="POST" action="{{ route('apis.destroy', ':USER_ID') }}">
                <input name="_method" type="hidden"  value="DELETE">
                <input name="_token" type="hidden" value="{{ csrf_token() }}">

              </form>
              <button type="submit" class="btn btn-danger btn-block" data-dismiss="modal" id="btn-eliminarr">Eliminar</button>
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <div id="ribbon">
        <ol class="breadcrumb">
            <li><a href="{{ url("home")}}">Inicio</a></li>
            <li>Correspondencia Enviada</li>
        </ol>
    </div>
    <div class="container" style="margin-top:20px;">

      <button type="button" class="btn btn-success" id="btn-creacion" data-toggle="modal" data-target="#creacion" name="button">Agregar</button>
      <table class="table table-striped table-bordered" id="enviadas-table">
          <thead>
          <tr>
              <th>Codigo</th>
              <th>Tipo</th>
              <th>Responsable</th>
              <th>Dirigido a:</th>
              <th>Referencia</th>
              <th>Fecha</th>
              <th>Adjunto</th>
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
        $('#enviadas-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: 'https://datatables.yajrabox.com/eloquent/add-edit-remove-column-data',
            ajax: '{!! route('enviado.data') !!}',
            columns: [
                { data: 'codigo', name: 'codigo', width: '5%'},
                { data: 'tipo', name: 'tipo' , width: '10%'},
                { data: 'nombre', name: 'nombre' , width: '10%'},
                { data: 'emitente', name: 'emitente' , width: '20%'},
                { data: 'referencia', name: 'referencia' , width: '20%'},
                { data: 'created_at', name: 'created_at' , width: '10%'},
                { data: 'adjunto', name: 'adjunto' , width: '10%'},
                { data: 'action', name: 'action', orderable: false, searchable: false, width: '15%'}
            ],
            dom: 'Bfrtip',
            buttons: [
                'copy'
            ],
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            }

        });
        // $('#users-table tbody').on('click', 'td>a.btnbtn', function () {
        //   event.preventDefault();
        //   var id = $(this).attr('id') ;
        //
        //   var url =  "{{ url('correspondencia/datos/$(id)')}}".replace('$(id)', id);
        //   console.log(url);
        //   $.get(url, function(data, status)
        //   {
        //       var ps = data[0].remitente;
        //       $('#rem').text(ps);
        //       $('#titulo').text(data[0].codigo);
        //       $('#ref').text(data[0].referencia);
        //       $('#estado').text(data[0].estado);
        //       $('#tipo').text(data[0].tipo);
        //       $('#fecha').text(data[0].f_creacion);
        //       $('#file').text(data[0].adjunto);
        //       $('#derivado').text(data[0].nombre + " " + data[0].paterno);
        //       $('#obs').text(data[0].observacion);
        //   }).fail(function()
        //   {
        //      console.log("Error");
        //   });
        // });
        $('#users-table tbody').on('click', 'td>a.btneliminar', function () {
          event.preventDefault();
          var id = $(this).attr('id');

          id = id.substring(1);
          $('#input_eliminar').val(id);

          // $.get(url, function(data, status)
          // {
          //     var ps = data[0].remitente;
          //     $('#rem').text(ps);
          //     $('#titulo').text(data[0].codigo);
          //     $('#ref').text(data[0].referencia);
          //     $('#estado').text(data[0].estado);
          //     $('#tipo').text(data[0].tipo);
          //     $('#fecha').text(data[0].f_creacion);
          //     $('#file').text(data[0].adjunto);
          //     $('#derivado').text(data[0].nombre + " " + data[0].paterno);
          //     $('#obs').text(data[0].observacion);
          //    console.log(data);
          // }).fail(function()
          // {
          //    console.log("Error");
          // });
        });
        $('#btn-eliminarr').on('click', function () {
            event.preventDefault();

            var id = $('#input_eliminar').val();
            var row = $('#e'+id).parents('tr');
            var form = $('#form-delete');
            var url = form.attr('action').replace(':USER_ID', id);
            var data = form.serialize();

            //var url =  "{{ url('correspondencia/eliminar/$(id)')}}".replace('$(id)', id);
            //console.log(url);

            $.post(url, data, function(result)
            {
              row.fadeOut();
              console.log(result);
            }).fail(function()
            {
                row.show();
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
