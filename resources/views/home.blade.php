@extends('Plantilla/plantilla')
@section('content')
    <div id="ribbon">
        <ol class="breadcrumb">
            <li>Inicio</li>
        </ol>
    </div>
    <h2 class="text-center">Sistema Administrativo - Fundacion PROFIN</h1>
    <div class="col-md-2">
    </div>
    <div class="col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Datos</h3>
        </div>
        <div class="panel-body">

            <table class="table table-bordered">

              <tr>
                <img src="{{ asset('img/Personal/'. Auth::user()->img) }}" class="img-responsive img-per-profin center-block">
              </tr>
              <tr>
                  <th>Nombre</th>
                  <td>{{ Auth::user()->nombre }}</td>
              </tr>
              <tr>
                  <th>Apellido</th>
                  <td>{{ Auth::user()->paterno }}</td>
              </tr>
              <tr>
                  <th>Email</th>
                  <td>{{ Auth::user()->email }}</td>
              </tr>
              <tr>
                  <th>Cargo</th>
                  <td>{{ Auth::user()->cargo }}</td>
              </tr>
            </table>
        </div>
      </div>
    </div>
    <div class="col-md-2">
    </div>

@endsection
