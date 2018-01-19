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
                <a href="#"><i class="fa fa-lg fa-fw fa-folder"></i> <span class="menu-item-parent">Correspondencia</span></a>
                <ul>
                    <li>
                        <a href="{{ url('/recibido') }}">
                          <i class="fa fa-lg fa-fw fa-arrow-circle-right"></i>
                          <span class="menu-item-parent">Recibida</span>
                          <span class="badge bg-color-red pull-right inbox-badge">9</span>
                        </a>
                    </li>
                    <li>
                      <a href="{{ url('rfids') }}">
                        <i class="fa fa-lg fa-fw fa-arrow-circle-left"></i>
                        <span class="menu-item-parent">Enviada</span>
                        <span class="badge bg-color-red pull-right inbox-badge">9</span>
                      </a>
                    </li>
                </ul>
            </li>

        </ul>
    </nav>


    <span class="minifyme" data-action="minifyMenu">
                    <i class="fa fa-arrow-circle-left hit"></i>
                </span>

</aside>
<!-- END NAVIGATION -->