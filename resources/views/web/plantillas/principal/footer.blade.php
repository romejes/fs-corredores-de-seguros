<footer>
  <!-- Contenido principal del pie de pagina -->
  <section id="footer-main">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-6 col-lg-4">
          <h3>Seguros para Personas</h3>
          <ul>
            @foreach($seguros[0]['seguros'] as $seguro)
              <li><a
                  href="{{ url('seguros/'. $seguro['slug']) }}">{{ $seguro['nombre'] }}</a>
              </li>
            @endforeach
          </ul>
        </div>
        <div class="col-12 col-sm-6 col-lg-4">
          <h3>Seguros para Empresas</h3>
          <ul>
            @foreach($seguros[1]['seguros'] as $seguro)
              <li><a
                  href="{{ url('seguros/'. $seguro['slug']) }}">{{ $seguro['nombre'] }}</a>
              </li>
            @endforeach
          </ul>
        </div>
        <div class="col-12 col-lg-4">
          <h3>Nuestra Oficina</h3>
          <div class="office-grid">
            <div class="office-icon-cell">
              <i class="fas fa-map-marker"></i>
            </div>
            <div class="office-info-cell">
              <span>Agrup. J. Rosa Ara A-12 (a 2da. Cdra. Ovalo Callao por la Av. Grau)</span>
            </div>
            <div class="office-icon-cell">
              <i class="fas fa-phone"></i>
            </div>
            <div class="office-info-cell">
              <span>+51 052-285846</span>
            </div>
          </div>
          <br>
          <br>
          <div class="supervised">
            <img src="{{ asset('images/sbs.svg')}}" id="img-logo-sbs" alt="Superintendencia de Banca y Seguros">
            <p>Trabajamos bajo supervision de la Superintendencia de Banca y Seguros</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Fin Contenido principal del pie de pagina -->

  <!-- Texto de copyright -->
  <section id="footer-copyright">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <p class="text-center">FS Corredores de Seguros &copy; {{ date('Y') }}. Todos los derechos
            reservados.</p>
        </div>
      </div>
    </div>
  </section>
  <!-- Fin Texto de copyright -->
</footer>