@extends('web.plantillas.principal')

@section('contenidoPlantillaPrincipal')
  <!-- Banner-->
  @component('web.componentes.banner', ["imagenBanner" => 'banner_seguros.jpg', 'tituloBanner' => "Nuestros Seguros"])
  @endcomponent
  <!-- Fin Banner -->

  <!-- Section -->
  @foreach ($seguros as $grupoSeguro)
  <section>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="clr-blue text-center">{{ $grupoSeguro['titulo']}}</h2>        
        </div>
        <div class="col-12">
          <div class="seguros-cards-container cards-container">
            @foreach ($grupoSeguro['seguros'] as $seguro )
            @component("web.componentes.card", [
              "imagen" => 'seguros/' . $seguro["imagen_miniatura"],
              "titulo" => $seguro['nombre']
            ])
              @slot('botones')
                <a href="{{ url('seguros/' . $seguro['slug']) }}" class="button button-primary">Mas información</a>
              @endslot
            @endcomponent       
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
  @endforeach
@endsection

@section('title')
Seguros
@endsection
