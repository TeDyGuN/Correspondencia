@extends('Plantilla/plantilla')

@section('content')

    <div id="ribbon">
        <ol class="breadcrumb">
            <li><a href="{{ url("home")}}">Inicio</a></li>
            <li>Proyectos</li>
        </ol>
    </div>
    <div class="container">
      <div class="panel panel-default" style="margin-top:20px;">
        <div class="panel-heading">
            <h3 class="panel-title">Proyectos</h3>
        </div>
        <div class="panel-body">
          <table class="table table-striped">
          <thead>
            <tr>
              <th></th>
              <th>Proyecto</th>
              <th>Progreso</th>
              <th>Contactos</th>
              <th>Estatus</th>
              <th>Inicio</th>
              <th>Fin</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($proyectos as $p)
                <tr>
                  <td>+</td>
                  <td>{{ $p->nombre }}</td>
                  <td>{{ $p->progress }}</td>
                  <td>{{ $p->contactos }}</td>
                  <td>{{ $p->status }}</td>
                  <td>{{ $p->inicio }}</td>
                  <td>{{ $p->fin }}</td>
                </tr>
              @endforeach
          </tbody>
          </table>
        </div>
      </div>
    </div>

@stop

@push('scripts')
