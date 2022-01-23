<nav class="navbar navbar-mobile">
  <ul class="menu">
    <li class="has-submenu">
      <a class="{{ Request::segment(1) === 'seguros' ? 'active' : '' }}" data-toggle="collapse" data-target="#submenu-1">
        Seguros
        <i class="fas fa-angle-down"></i>
      </a>
      <ul class="submenu collapse" id="submenu-1">
        @foreach($seguros as $indice => $grupoSeguro)
          <li class="has-submenu">
            <a data-toggle="collapse" data-target="#seguros-{{ $indice }}"
              class="{{ $indice == 0 ? 'active':'' }}">
              {{ $grupoSeguro['titulo'] }}
              <i class="fas fa-angle-down"></i>
            </a>
            <ul class="submenu collapse" id="seguros-{{ $indice }}">
              @foreach($grupoSeguro['seguros'] as $seguro)
                <li><a
                    href="{{ asset('seguros/'. $seguro['slug']) }}">{{ $seguro['nombre'] }}</a>
                </li>
              @endforeach
            </ul>
          </li>
        @endforeach
      </ul>
    </li>
    <li>
      <a class="{{ Request::segment(1) === 'servicios_en_linea' ? 'active' : '' }}" href="{{ asset('servicios_en_linea') }}">Servicios en linea</a>
    </li>
    <li><a class="{{ Request::segment(1) === 'nosotros' ? 'active' : '' }}" href="{{ asset('nosotros') }}">Nosotros</a></li>
    <li><a class="{{ Request::segment(1) === 'clientes' ? 'active' : '' }}" href="{{ asset('clientes') }}">Clientes</a></li>
    <li><a class="{{ Request::segment(1) === 'contacto' ? 'active' : '' }}" href="{{ asset('contacto') }}">Contacto</a></li>
    <li><a href="{{ asset('intranet') }}" target="_blank">Intranet corporativa</a></li>
  </ul>
</nav>