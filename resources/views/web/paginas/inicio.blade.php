@extends('web.plantillas.principal')

@section('contenidoPlantillaPrincipal')
<!-- Carousel -->
@component('web.componentes.carousel', compact('imagenesCarousel'))
@endcomponent
<!-- Fin Carousel -->

<!-- Seccion Nuestros Seguros -->
<section class="bgc-white">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="clr-blue text-center">Nuestros Seguros</h2>
      </div>
      <div class="col-12">
        <div class="cards-container seguros-cards-container">
          @foreach ($segurosPrincipales as $seguro )
            @component("web.componentes.card", [
              "imagen" => 'seguros/' . $seguro["imagen_miniatura"],
              "titulo" => $seguro['nombre'],
              "descripcion" => $seguro['resumen']
            ])
              @slot('botones')
                <a href="{{ url('seguros/' . $seguro['slug']) }}" class="button button-primary">Mas información</a>
              @endslot
            @endcomponent       
          @endforeach
        </div>
      </div>
      <div class="col-12 text-center">
        <a href="{{ url('seguros') }}" class="button button-primary mt-3">Ver todos los seguros</a>
      </div>
    </div>
  </div>
</section>
<!-- Fin Seccion Nuestros Seguros -->

<!-- Seccion: Buscas SOAT -->
<section class="bgc-blue">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="text-center clr-white">¿Necesitas un SOAT?<br />Tranquilo, nosotros lo tenemos</h2>
      </div>
      <div class="col-12 text-center">
        <a href="{{ url('solicitudes/cotizar_soat') }}" data-aos="fade-right" class="button button-alt m-2">Cotiza aquí</a>
        <a href="{{ url('solicitudes/comprar_soat') }}" data-aos="fade-left" class="button button-alt m-2">Compra aquí</a>
      </div>
    </div>
  </div>
</section>
<!-- Fin Seccion: Buscas SOAT -->

<!-- Seccion: Compañias de Seguros -->
<section class="bgc-grey">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="clr-blue text-center">Trabajamos con las principales aseguradoras del país</h2>
      </div>
      <div class="col-12">
        <div class="wrapper-companias_seguro">
          <img data-aos="fade-up" class="logo-compania_seguro" src="{{ asset('images/aseguradoras/mapfre.svg') }}"
            alt="MAPFRE" />
          <img data-aos="fade-up" class="logo-compania_seguro"
            src="{{ asset('images/aseguradoras/lapositivaseguros.svg') }}" alt="La Positiva" />
          <img data-aos="fade-up" class="logo-compania_seguro" src="{{ asset('images/aseguradoras/pacifico.svg') }}"
            alt="Pacífico" />
          <img data-aos="fade-up" class="logo-compania_seguro" src="{{ asset('images/aseguradoras/rimac.svg') }}"
            alt="Rimac" />
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Fin Seccion: Compañias de Seguros -->
@endsection

@section('title') Pagina de Inicio @endsection

@push('scripts')
<script src="{{ asset('js/web/inicio.js') }}"></script>
@endpush