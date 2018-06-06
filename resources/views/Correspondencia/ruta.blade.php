@extends('Plantilla/plantilla')

@section('content')
    <div id="ribbon">
        <ol class="breadcrumb">
            <li><a href="{{ url("home")}}">Inicio</a></li>
            <li><a href="{{ url('/recibido') }}">Correspondencia Recibida</a></li>
            <li>Hoja de Ruta</li>
        </ol>
    </div>
    <!-- Small boxes (Stat box) -->
    <div class="container">
        <div class="row" >
          <div class="col-md-6">
            <div class="panel panel-default" id="panel-profin">
                <div class="panel-heading text-center textoHeader">Datos /  {{ $aso->codigo }}</div>
                <div class="panel-body">
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
                      <th>Archivo</th>
                      <td><a href=" {{ url('storage/'.$aso->file ) }} ">{{ $aso->file }}</a></td>
                    </tr>
                    <tr>
                      <th>Observacion</th>
                      <td >{{ $aso->observacion }}</td>
                    </tr>
                  </table>
                </div>
            </div>
          </div>
          <div class="col-md-6">
              <div class="panel panel-default" id="panel-profin">
                  <div class="panel-heading text-center textoHeader">Registro Ruta /  {{ $aso->codigo }}</div>
                  <div class="panel-body">
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
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/correspondencia/rutanuevo') }}">
                                {{ csrf_field() }}
                                <input type="text" name="_id" hidden value="{{ $aso->id }}">
                                <div class="form-group">
                                    <label for="c_estado" class="col-md-3 control-label">Estado </label>
                                    <div class="col-md-9">
                                      <select class="form-control" name="c_estado">
                                          <option value="Abierto">Abierto</option>
                                          <option value="Cerrado">Cerrado</option>
                                      </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="c_accion" class="col-md-3 control-label">Accion </label>

                                    <div class="col-md-9">
                                      <select class="form-control" name="c_accion">
                                          <option value="Rev. Informacion">Revisar Informacion</option>
                                          <option value="Derivar">Derivar</option>
                                          <option value="Reg. Correspondencia">Registrar Correspondencia</option>
                                          <option value="Archivar">Archivar</option>
                                      </select>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('seguimiento') ? ' has-error' : '' }}">
                                    <label for="seguimiento" class="col-md-3 control-label">Seguimiento</label>

                                    <div class="col-md-9">
                                        <input id="seguimiento" type="text" class="form-control" name="seguimiento" value="{{ old('seguimiento') }}" rows="3" required>
                                          </textarea>

                                        @if ($errors->has('seguimiento'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('seguimiento') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="c_der" class="col-md-3 control-label">Derivado a: </label>

                                    <div class="col-md-9">
                                        <select class="form-control" name="c_der" id="c_der">
                                          @foreach($users as $u)
                                            <option value="{{ $u->id }}">{{ $u->nombre . ' ' . $u->paterno }}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-9 col-md-offset-3">
                                      @if( $aso->estado == "Abierto")
                                        <button type="submit" class="btn btn-primary btn-block">
                                            <i class="fa fa-btn fa-user"></i> Registrar
                                        </button>
                                      @else

                                        <button type="submit" class="btn btn-primary btn-block" disabled>
                                            <i class="fa fa-btn fa-user"></i> Registrar
                                        </button>
                                        <h3 class="text-center"><span class="label label-warning">Correspondencia Cerrada</span></h3>
                                      @endif
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
                </div>


            </div>
        </div>
        <div class="row">

          <div class="col-md-12">
            <div class="panel panel-default" id="panel-profin">
                <div class="panel-heading text-center textoHeader">Hoja de Ruta -  {{ $aso->codigo }}</div>
                <div class="panel-body">
                  <a href="{{ url('reporte/hoja').'/'.$aso->id}}" target="_blank"><button type="" class="btn btn-primary">
                      <i class="fa fa-btn fa-user"></i> Imprimir
                  </button></a>
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
                               @if($p->estado == "Abierto")
                                 <th><span class="label label-danger">{{ $p->estado }}</span></th>
                               @else
                                 <th><span class="label label-primary">{{ $p->estado }}</span></th>
                               @endif
                           </tr>
                       @endforeach
                      </tbody>
                  </table>
                </div>
            </div>
          </div>
        </div>
    </div>
@endsection
@push('scripts')
  <script type="text/javascript">
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
    </script>
@endpush
