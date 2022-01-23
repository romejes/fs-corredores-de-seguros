@extends('web.plantillas.principal')

@section('contenidoPlantillaPrincipal')

<!-- Banner -->
@component('web.componentes.banner', [ "imagenBanner" => "banner_servicios.jpg", "tituloBanner" => "Solicite su seguro"])
@endcomponent
<!-- Fin Banner -->

<section>
  <div class="container">
    <div class="row">
      <!-- Lista Servicios -->
      <div class="d-none d-lg-block col-lg-4" id="servicios-list">
        @foreach($servicios as $servicio)
          <h4>{{ $servicio['seguro'] }}</h4>
          <ul>
            @foreach($servicio['opciones'] as $opcion)
              <li
                class="{{ Request::segment(2) == $opcion['slug'] ? 'active':'' }}">
                <a
                  href="{{ url('servicios_en_linea/'.$opcion['slug']) }}">{{ $opcion['nombre'] }}</a>
              </li>
            @endforeach
          </ul>
        @endforeach
      </div>
      <!-- Fin Lista Servicios -->

      <!-- DropdownList de Servicios-->
      <div class="d-block d-lg-none col-12">
        <select name="servicios" id="sel-servicios" class="form-control mb-4">
          <option value="" selected>-- Escoja la solicitud que desea realizar --</option>
          @foreach($servicios as $servicio)
            <optgroup label="{{ $servicio['seguro'] }}">
              @foreach($servicio['opciones'] as $opcion)
                <option
                  data-href="{{ url('servicios_en_linea/'. $opcion['slug']) }}">
                  {{ $opcion['nombre'] }}</option>
              @endforeach
            </optgroup>
          @endforeach
        </select>
      </div>
      <!-- Fin DropdownList de Servicios-->

      <!-- Formulario de Solicitud -->
      <div class="col-12 col-lg-8" id="servicio-detail-container">
        @yield('formularioServicio')
      </div>
      <!-- Fin Formulario de Solicitud-->
    </div>
  </div>
</section>
@endsection


@push('scripts')
<script src="{{ asset('js/web/servicios.js') }}"></script>
@endpush