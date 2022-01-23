@extends('web.plantillas.principal')

@section('contenidoPlantillaPrincipal')
  <!-- Banner-->
  @component('web.componentes.banner', ["imagenBanner" => 'banner_contacto.jpg', 'tituloBanner' => "Contáctanos"])
  @endcomponent
  <!-- Fin Banner-->

  <!-- Seccion: Formulario de Contacto -->
  <section>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="text-center clr-blue">Envíanos tus preguntas o sugerencias</h2>
          <form method="POST" id="frm-contact" class="form-row" novalidate>
            <div class="form-group col-lg-6">
              <label for="txt-nombres">Nombres y Apellidos</label>
              <input type="text" name="nombres-apellidos" id="txt-nombres-apellidos" class="form-control" required>
            </div>
            <div class="form-group col-lg-6">
              <label for="txt-asunto">Asunto</label>
              <input type="text" name="asunto" id="txt-asunto" class="form-control" required>
            </div>
            <div class="form-group col-lg-6">
              <label for="txt-email">Correo electrónico</label>
              <input type="email" name="email" id="txt-email" class="form-control" required>
            </div>
            <div class="form-group col-lg-6">
              <label for="txt-telefono">Teléfono/Celular</label>
              <input type="tel" name="telefono" id="txt-telefono" class="form-control" required>
            </div>
            <div class="form-group col-12">
              <label for="txt-comentario">Comentarios, quejas o sugerencias</label>
              <textarea name="comentario" id="txt-comentario" cols="30" rows="5" class="form-control"
                required></textarea>
            </div>
            <button class="button button-primary" type="button" id="btn-send">Enviar</button>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- Fin Seccion: Formulario de Contacto -->

  <!-- Seccion: Ubicacion -->
  <section id="map-section">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="text-center clr-blue">... o visita nuestra oficina</h2>
        </div>
      </div>
    </div>
    <div id="map"></div>
  </section>
  <!-- Fin Seccion: Ubicacion -->
@endsection


@section('title')
Contacto
@endsection

@push('scripts')
<script src="{{ asset('js/web/contacto.js') }}"></script>
@endpush