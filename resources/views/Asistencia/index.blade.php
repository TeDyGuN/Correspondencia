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
            <h3 class="panel-title">Consultar Asistencia</h3>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" enctype="multipart/form-data"  method="POST" action="{{ url('asistencia/consultar') }}">
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
                    <label class="col-md-4 control-label colorazul" style="font-size: 1.2em">Año</label>
                    <div class="col-md-6">
                        <select class="form-control" name="anio">
                            @foreach($anio as $a)
                                <option value="{{ $a }}">{{ $a }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label colorazul" style="font-size: 1.2em">Mes</label>
                    <div class="col-md-6">
                        <select class="form-control" name="mes">
                           <?php $i=1; ?>
                            @foreach($mes as $m)
                                <?php $i=$i+1; ?>
                                <option value="{{ $i }}">{{ $m }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                {{-- <div class="form-group{{ $errors->has('num_modulo') ? ' has-error' : '' }}">
                    <label for="num" class="col-md-4 control-label colorazul" style="font-size: 1.2em">Numero de Registros: </label>
                    <div class="col-md-6">
                        <input id="num" type="number" class="form-control" name="num" value="{{ old('num') }}" required autofocus>

                        @if ($errors->has('num'))
                            <span class="help-block">
                                <strong>{{ $errors->first('num') }}</strong>
                            </span>
                        @endif
                    </div>
                </div> --}}

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary btn-block">
                            Consultar
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
