@extends('web.plantillas.principal')

@section('contenidoPlantillaPrincipal')
<main>
  <!-- Heading Page-->
  @component('web.componentes.banner', ["imagenBanner" => 'banner_servicios.jpg', "tituloBanner" => "Solicite su seguro"])
  @endcomponent
  <!-- End Heading Page-->

  <!-- Section -->
  <section>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="clr-blue text-center">¿Qué es lo que desea hacer?</h2>        
        </div>
        <div class="col-12">
          <div class="seguros-cards-container cards-container">
            @foreach ($servicios as $servicio )
              @component("web.componentes.card", [
                "imagen" => 'seguros/' . $servicio["imagen_miniatura"],
                "titulo" => $servicio['seguro']
              ])
                @slot('botones')
                  @foreach ($servicio['opciones'] as $opcion)
                    <a href="{{ url('servicios_en_linea/' . $opcion['slug']) }}" class="button button-primary">{{ $opcion['nombre'] }}</a>
                  @endforeach
                @endslot

              @endcomponent       
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Section -->
</main>
@endsection

@section('title')
Servicios en Linea
@endsection