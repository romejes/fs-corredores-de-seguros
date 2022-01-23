<header>
  <div class="container">
    <div class="row">
      <div class="col-12 d-flex justify-content-between align-items-stretch">
        <!-- Logo FS -->
        <a href="{{ url('/') }}">
          <img src="{{ asset('images/logo.svg') }}" alt="FS Corredores de Seguros" id="header-logo">
        </a>
        <!-- Fin Logo FS -->

        <!-- Menu -->
        @include('web.plantillas.principal.nav')
        <!-- Fin Menu -->

        <!-- Boton menu smartphone -->
        <button id="btn-menu">
          <i class="fas fa-bars fa-2x"></i>
        </button>
        <!-- Fin Boton menu smartphone -->
      </div>
    </div>
  </div>
</header>