<nav class="navbar navbar-desktop">
  <ul class="menu">
    <li class="has-submenu">
      <a
        class="{{ Request::segment(1) === 'seguros' ? 'active' : '' }}">Seguros
      </a>
      <div class="submenu">
        <div class="container">
          <div class="row">
            <ul class="nav menu-tab col-3">
              @foreach($seguros as $indice => $grupoSeguro)
                <li>
                  <a data-toggle="tab" data-target="#seguros-{{ $indice }}"
                    class="nav-link {{ $indice == 0 ? 'active':'' }}">{{ $grupoSeguro['titulo'] }}
                  </a>
                </li>
              @endforeach
            </ul>
            <div class="tab-content col">
              @foreach($seguros as $indice => $grupoSeguro)
                <div id="seguros-{{ $indice }}"
                  class="tab-pane {{ $indice == 0 ? 'active':'' }}">
                  <ul>
                    @foreach($grupoSeguro['seguros'] as $seguro)
                      <li><a
                          href="{{ asset('seguros/'. $seguro['slug']) }}">{{ $seguro['nombre'] }}</a>
                      </li>
                    @endforeach
                  </ul>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </li>
    <li><a
        class="{{ Request::segment(1) === 'servicios_en_linea' ? 'active' : '' }}"
        href="{{ asset('servicios_en_linea') }}">Servicios en linea</a>
    </li>
    <li><a
        class="{{ Request::segment(1) === 'nosotros' ? 'active' : '' }}"
        href="{{ asset('nosotros') }}">Nosotros</a></li>
    <li><a
        class="{{ Request::segment(1) === 'clientes' ? 'active' : '' }}"
        href="{{ asset('clientes') }}">Clientes</a></li>
    <li><a
        class="{{ Request::segment(1) === 'contacto' ? 'active' : '' }}"
        href="{{ asset('contacto') }}">Contacto</a></li>
    <li><a href="{{ asset('intranet') }}" target="_blank"><i class="fa fa-lock"></i></a></li>
  </ul>
</nav>