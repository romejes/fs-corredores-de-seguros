<div class="carousel owl-carousel">
  @foreach($imagenesCarousel as $imagen)
    <div class="carousel-slide"
      data-img="{{ asset('images/carousel/' . $imagen['imagen_pequena']) }}"
      data-md-img="{{ asset('images/carousel/' . $imagen['imagen_grande']) }}">
      <div class="carousel-slide-caption">
        <h2 class="carousel-slide-title">{{ $imagen['titulo'] }}</h2>
        <p>{{ $imagen['descripcion'] }}</p>
        @foreach($imagen['botones'] as $boton )
          <a class="button button-primary"
            href="{{ asset($boton['url']) }}">{{ $boton['nombre'] }}</a>
        @endforeach
      </div>
    </div>
  @endforeach
</div>