@extends('Plantilla/plantilla')

@section('content')
    <div id="ribbon">
        <ol class="breadcrumb">
            <li>Inicio</li><li>Editar Corrrespondencia</li>
        </ol>
    </div>
    <!-- Small boxes (Stat box) -->
    <div class="container">
        <div class="row" >
            <div class="">
                <div class="panel panel-default" id="panel-profin">
                    <div class="panel-heading text-center textoHeader">Modificacion de Corrrespondencia</div>
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
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('correspondencia/editar/guardar') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $aso->id }}">
                                <div class="form-group{{ $errors->has('remitente') ? ' has-error' : '' }}">
                                    <label for="remitente" class="col-md-4 control-label">Remitente</label>

                                    <div class="col-md-6">
                                        <input id="remitente" type="text" class="form-control" name="remitente" value="{{ $aso->remitente }}">

                                        @if ($errors->has('remitente'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('remitente') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('referencia') ? ' has-error' : '' }}">
                                    <label for="referencia" class="col-md-4 control-label">Referencia</label>

                                    <div class="col-md-6">
                                        <input id="referencia" type="text" class="form-control" name="referencia" value="{{ $aso->referencia }}">

                                        @if ($errors->has('referencia'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('referencia') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="c_documento" class="col-md-4 control-label">Documento </label>
        
                                    <div class="col-md-6">
                                        <input type="file" name="archivo" id="archivo" name="archivo"/>
                                    </div>
        
                                </div>
                                <div class="form-group{{ $errors->has('c_obs') ? ' has-error' : '' }}">
                                    <label for="c_obs" class="col-md-4 control-label">Observacion</label>
                                    <div class="col-md-6">
                                        <input id="c_obs" type="text" required class="form-control" name="c_obs" value="{{ $aso->observacion }}">
        
                                        @if ($errors->has('c_obs'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('c_obs') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-btn fa-user"></i> Modificar Corrrespondencia
                                        </button>
                                    </div>
                                </div>
                            </form>
                        <br><br>
                        {{$success = Session::get('success')}}
                        @if ($success)
                            <div class="alert alert-success">
                                <strong>!!Felicidades!!</strong> Se Modifico la Corrrespondencia exitosamente<br><br>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection