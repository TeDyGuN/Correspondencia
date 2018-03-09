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
              <th>Proyecto</th>
              <th>Progreso</th>
              <th><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Contactos</th>
              <th>Estatus</th>
              <th>Presupuesto</th>
              <th><i class="fa fa-fw fa-calendar text-muted hidden-md hidden-sm hidden-xs"></i> Inicio</th>
              <th><i class="fa fa-fw fa-calendar text-muted hidden-md hidden-sm hidden-xs"></i> Fin</th>
              <th>Gestion de Proyecto</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($proyectos as $p)
                <tr role="row">
                  <td>
                    <a href="{{ url('proyecto/' . $p->id)}}">{{ $p->nombre }}</a>
                  </td>
                  <td>
                    <div class="progress progress-xs" data-progressbar-value="{{ $p->progreso }}">
                      <div class="progress-bar"></div>
                    </div>
                  </td>
                  <td>
                    <div class="project-members">
                      @foreach ($users as $u)
                        @if($u->id_proyecto == $p->id)
                          <a href="#">
                            <img src="{{ asset('img/Personal/'. $u->img) }}" class="online" title="{{ $u->nombre . ' '. $u->paterno }}">
                          </a>
                        @endif
                      @endforeach
                      <a href="#">
                        <img src="{{ asset('img/Personal/'. $users[3]->img) }}" class="online" title="{{ $users[3]->nombre . ' '. $users[3]->paterno }}">
                      </a>
                      <a href="#">
                        <img src="{{ asset('img/Personal/'. $users[0]->img) }}" class="online" title="{{ $users[0]->nombre . ' '. $users[0]->paterno }}">
                      </a>
                    </div>

                  </td>
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
                  <td>
                    <a href="#">Gestion</a>
                  </td>
                </tr>
                {{-- <tr class="parque">
                  <td colspan="8">
                    <table cellpadding="5" cellspacing="0" border="0" class="table table-hover table-condensed">
                      <tbody>
                        <tr>
                          <td style="width:100px">
                            Nombre del Proyecto:
                          </td>
                          <td>
                            {{ $p->nombre }}<br><small class="text-muted"><i>Presupuesto: {{ $p->presupuesto }}<i></i></i></small>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            Fin del Proyecto:
                          </td>
                          <td>
                            <strong>{{ $p->fin }}</strong>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            Extra info:
                          </td>
                          <td>
                            And any further details here (images etc)...
                          </td>
                        </tr>
                        <tr>
                          <td>
                            Comments:
                          </td>
                          <td>
                            This is a blank comments area, used to add comments and keep notes
                          </td>
                        </tr>
                        <tr>
                          <td>
                            Action:
                          </td>
                          <td>
                            <button class="btn btn-xs">Open case</button>
                            <button class="btn btn-xs btn-danger pull-right" style="margin-left:5px">Delete Record</button>
                            <button class="btn btn-xs btn-success pull-right">Save Changes</button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr> --}}
              @endforeach

          </tbody>
          </table>
        </div>
      </div>
    </div>

@stop

@push('scripts')
