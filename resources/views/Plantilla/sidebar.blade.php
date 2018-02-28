<aside id="left-panel">
    {{-- <div class="login-info">
				<span> <!-- User image size is adjusted inside CSS, it should stay as is -->
          Fundacion PROFIN
				</span>
    </div> --}}
    <!-- User info -->
    <div class="login-info">
        <span> <!-- User image size is adjusted inside CSS, it should stay as it -->

            <a class="nav-link text-success btn btn-outline-success" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
               <span>
                   Cerrar Sesion
               </span>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: one;">
                {{ csrf_field() }}
            </form>


        </span>
    </div>
    <!-- end user info -->

    <!-- NAVIGATION : This navigation is also responsive-->
    <nav>
        <!--
        NOTE: Notice the gaps after each icon usage <i></i>..
        Please note that these links work a bit different than
        traditional href="" links. See documentation for details.
        -->

        <ul>
            <li class="active">
                <a href="{{ url('/panel') }}" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Inicio</span></a>
            </li>
            @if (Auth::user()->ROLE == 'Admin')
              <li>
                  <a href="#"><i class="fa fa-lg fa-fw fa-user"></i> <span class="menu-item-parent">Gestion de Usuario</span></a>
                  <ul>
                      <li>
                          <a href="{{ url('user/registro') }}">Crear Usuario</a>
                      </li>
                      <li>
                          <a href="{{ url('user/modificar') }}">Modificar Usuario</a>
                      </li>
                  </ul>
              </li>
            @endif
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-table"></i> <span class="menu-item-parent">Asistencia</span></a>
                <ul>
                    <li>
                        <a href="{{ url('asistencia') }}">Reporte de Asistencia</a>
                    </li>
                    @if (Auth::user()->ROLE == 'Admin')
                      <li>
                          <a href="{{ url('asistencia/planilla') }}">Subir Planilla</a>
                      </li>
                      <li>
                          <a href="{{ url('asistencia/profin') }}">Reporte PROFIN</a>
                      </li>
                    @endif
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-folder"></i> <span class="menu-item-parent">Correspondencia</span></a>
                <ul>
                  <li class="open">
                    <a href="#">
                        <i class="fa fa-lg fa-fw fa-arrow-circle-right"></i>
                      <span>Recibidas</span>
                    </a>
                    <ul>
                      @if (Auth::user()->ROLE == 'Admin')
                        <li>
                            <a href="{{ url('/recibido') }}">
                              <i class="fa fa-lg fa-fw fa-home"></i>
                              <span class="menu-item-parent">Recibida PROFIN</span>
                            </a>
                        </li>
                      @endif
                      <li >
                          <a href="{{ url('/pendientes') }}">
                            <i class="fa fa-lg fa-fw fa-user"></i>
                            <span class="menu-item-parent">Recibida Pend.</span>
                            {{-- <span class="badge bg-color-red pull-right inbox-badge">{{ $num }}</span> --}}
                          </a>
                      </li>
                    </ul>
                  </li>
                  <li class="open">
                    <a href="#">
                        <i class="fa fa-lg fa-fw fa-arrow-circle-left"></i>
                      <span>Enviados</span>
                    </a>
                    <ul>
                      @if (Auth::user()->ROLE == 'Admin')
                        <li>
                            <a href="{{ url('/enviadoGeneral') }}">
                              <i class="fa fa-lg fa-fw fa-home"></i>
                              <span class="menu-item-parent">Enviada PROFIN</span>
                            </a>
                        </li>
                      @endif
                      <li>
                          <a href="{{ url('/enviado') }}">
                            <i class="fa fa-lg fa-fw fa-user"></i>
                            <span class="menu-item-parent">Enviados</span>
                          </a>
                      </li>
                    </ul>
                  </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-fighter-jet"></i> <span class="menu-item-parent">Vacaciones</span></a>
                <ul>
                  <li>
                      <a href="{{ url('vacacion/control') }}">Control de Vacaciones</a>
                  </li>

                  @if (Auth::user()->ROLE == 'Admin')
                    <li>
                        <a href="{{ url('vacacion') }}">Solicitud de Vacación</a>
                    </li>
                    <li>
                        <a href="{{ url('vacacion/asignacion') }}">Asignación de Vacación</a>
                    </li>
                    <li>
                        <a href="{{ url('vacacion/atrasos') }}">Atrasos</a>
                    </li>
                  @endif
                </ul>
            </li>
            {{-- <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-briefcase"></i> <span class="menu-item-parent">Seguimiento</span></a>
                <ul>
                  <li>
                      <a href="{{ url('vacacion/control') }}">Proyecto</a>
                  </li>

                  @if (Auth::user()->ROLE == 'Admin')
                    <li>
                        <a href="{{ url('vacacion') }}">Solicitud de Vacación</a>
                    </li>
                    <li>
                        <a href="{{ url('vacacion/asignacion') }}">Asignación de Vacación</a>
                    </li>
                    <li>
                        <a href="{{ url('vacacion/atrasos') }}">Atrasos</a>
                    </li>
                  @endif
                </ul>
            </li> --}}
            {{-- <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-folder"></i> <span class="menu-item-parent">Proyectos</span></a>
                <ul>
                  <li>
                    <a href="#">
                        <i class="fa fa-lg fa-fw fa-arrow-circle-right"></i>
                      <span>Fundacion PROFIN</span>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                        <i class="fa fa-lg fa-fw fa-arrow-circle-right"></i>
                      <span>MISE II</span>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                        <i class="fa fa-lg fa-fw fa-arrow-circle-right"></i>
                      <span>Mercados Inclusivos</span>
                    </a>
                  </li>
                </ul>
            </li> --}}

        </ul>
    </nav>


    <span class="minifyme" data-action="minifyMenu">
                    <i class="fa fa-arrow-circle-left hit"></i>
                </span>

</aside>
<!-- END NAVIGATION -->
