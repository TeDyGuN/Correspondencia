@extends('Plantilla/plantilla')

@section('content')

    <div id="ribbon">
        <ol class="breadcrumb">
            <li><a href="{{ url("home")}}">Inicio</a></li>
            <li>Proyectos</li>
        </ol>
    </div>
    <div class="container">
       <div class="row">
           <div class="panel panel-default" id="panel-profin">
               <div class="panel-heading">
                   <h3 class="panel-title" style="text-align: center">{{ $proyectos[0]->nombre  }}</h3>
               </div>
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
                         <form class="form-horizontal" role="form" method="POST" action="{{ url('/proyecto/indicador/save') }}">
                             {{ csrf_field() }}
                             <input type="text" name="_id" hidden value="{{ $proyectos[0]->id }}">

                             <div class="form-group {{ $errors->has('seguimiento') ? ' has-error' : '' }}">
                                 <label for="seguimiento" class="col-md-4 control-label">Indicador</label>

                                 <div class="col-md-6">
                                     <textarea class="form-control" rows="6" name="indicador" style="overflow:hidden"></textarea>

                                     @if ($errors->has('seguimiento'))
                                         <span class="help-block">
                                             <strong>{{ $errors->first('seguimiento') }}</strong>
                                         </span>
                                     @endif
                                 </div>
                             </div>
                             <div class="form-group {{ $errors->has('unidad') ? ' has-error' : '' }}">
                                 <label for="unidad" class="col-md-4 control-label">Unidad de Medida</label>

                                 <div class="col-md-6">
                                     <input id="unidad" type="text" class="form-control" name="unidad" rows="3" required>
                                     @if ($errors->has('unidad'))
                                         <span class="help-block">
                                             <strong>{{ $errors->first('unidad') }}</strong>
                                         </span>
                                     @endif
                                 </div>
                             </div>
                             <div class="form-group {{ $errors->has('f_planificado') ? ' has-error' : '' }}">
                                 <label for="f_planificado" class="col-md-4 control-label">Fase Planificado</label>

                                 <div class="col-md-6">
                                     <input id="f_planificado" type="number" class="form-control" name="f_planificado" required>
                                     @if ($errors->has('f_planificado'))
                                         <span class="help-block">
                                             <strong>{{ $errors->first('f_planificado') }}</strong>
                                         </span>
                                     @endif
                                 </div>
                             </div>

                             <div class="form-group {{ $errors->has('a_planificado') ? ' has-error' : '' }}">
                                 <label for="a_planificado" class="col-md-4 control-label">Anual Planificado</label>

                                 <div class="col-md-6">
                                     <input id="a_planificado" type="number" class="form-control" name="a_planificado" required>
                                     @if ($errors->has('a_planificado'))
                                         <span class="help-block">
                                             <strong>{{ $errors->first('a_planificado') }}</strong>
                                         </span>
                                     @endif
                                 </div>
                             </div>
                             <div class="form-group {{ $errors->has('f_ejecutado') ? ' has-error' : '' }}">
                                 <label for="f_ejecutado" class="col-md-4 control-label">Fase Ejecutado</label>

                                 <div class="col-md-6">
                                     <input id="f_ejecutado" type="number" class="form-control" name="f_ejecutado" required>
                                     @if ($errors->has('f_ejecutado'))
                                         <span class="help-block">
                                             <strong>{{ $errors->first('f_ejecutado') }}</strong>
                                         </span>
                                     @endif
                                 </div>
                             </div>

                             <div class="form-group {{ $errors->has('a_ejecutado') ? ' has-error' : '' }}">
                                 <label for="a_ejecutado" class="col-md-4 control-label">Anual Ejectuado</label>

                                 <div class="col-md-6">
                                     <input id="a_ejecutado" type="number" class="form-control" name="a_ejecutado" required>
                                     @if ($errors->has('a_ejecutado'))
                                         <span class="help-block">
                                             <strong>{{ $errors->first('a_ejecutado') }}</strong>
                                         </span>
                                     @endif
                                 </div>
                             </div>


                             <div class="form-group">
                                 <div class="col-md-6 col-md-offset-4">
                                   <button type="submit" class="btn btn-primary btn-block">
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
           </div>
       </div>
       <div class="row">
            <div class="panel panel-default" id="panel-profin">
              <div class="panel-heading">
                  <h3 class="panel-title" style="text-align: center">Tablero de Indicadores</h3>
              </div>

              <div class="panel-body">
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                        <th>N°</th>
                        <th>Indicador</th>
                        <th>Intervenciónes</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($indicadores as $f)
                        <tr>
                            <td>{{ $f->id }}</td>
                            <td>{{ $f->indicador }}</td>
                            <td>
                              <a href="#">Intervención</a>
                            </td>

                        </tr>
                    @endforeach
                  </tbody>

                </table>
              </div><!-- /.box-body -->

         </div>
       </div>
   </div>
@stop

@push('scripts')
