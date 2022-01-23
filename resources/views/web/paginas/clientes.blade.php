@extends('web.plantillas.principal')

@section('contenidoPlantillaPrincipal')
<main>
  <!-- Banner-->
  @component('web.componentes.banner', ["imagenBanner" => 'banner_clientes.jpg', 'tituloBanner' => "Nuestros Clientes"])
  @endcomponent
  <!-- Fin Banner -->

  <!-- Seccion Entidades Publicas -->
  <section>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="clr-blue text-center">Entidades Públicas</h2>
        </div>
        <div class="col-12">
          <div class="cards-container clients-cards-container">
          @foreach ($clientes["publicas"] as $entidadPublica)
            @component("web.componentes.card", [
              "imagen" => 'clientes/' . $entidadPublica['logo'],
              "titulo" => $entidadPublica['nombre']
            ])
            @endcomponent
          @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Fin Seccion Entidades Publicas -->

  <!-- Seccion Entidades Privadas -->
  <section>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="clr-blue text-center">Entidades Privadas</h2>
        </div>
        <div class="col-12">
          <div class="cards-container clients-cards-container">
          @foreach ($clientes["privadas"] as $entidadPrivada)
            @component("web.componentes.card", [
              "imagen" => is_null($entidadPrivada['logo']) ? 'no_logo.png' : 'clientes/' . $entidadPrivada['logo'],
              "titulo" => $entidadPrivada['nombre']
            ])
            @endcomponent
          @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Fin Seccion Entidades Privadas -->
</main>
@endsection


@section('title')
Clientes
@endsection