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
          <table id="example" class="display projects-table table table-striped table-bordered table-hover dataTable no-footer"
          cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
          <thead>
            <tr>
              <th></th>
              <th>Proyecto</th>
              <th>Progreso</th>
              <th><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Contactos</th>
              <th>Estatus</th>
              <th>Presupuesto</th>
              <th><i class="fa fa-fw fa-calendar text-muted hidden-md hidden-sm hidden-xs"></i> Inicio</th>
              <th><i class="fa fa-fw fa-calendar text-muted hidden-md hidden-sm hidden-xs"></i> Fin</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($proyectos as $p)
                <tr role="row">
                  <td class="details-control">

                  </td>
                  <td>{{ $p->nombre }}</td>
                  <td>
                    <div class="progress progress-xs" data-progressbar-value="{{ $p->progreso }}">
                      <div class="progress-bar"></div>
                    </div>
                  </td>
                  <td>Contactos</td>
                  @if (  $p->estatus == "Activo")
                    <td class="text-center">
                      <span class="label label-success">Activo</span>
                    </td>
                  @else
                    <td class="text-center">
                      <span class="label label-default">Inactivo</span>
                    </td>
                  @endif
                  <td>
                      BOB. {{ $p->presupuesto }}
                  </td>
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
