@extends('web.plantillas.principal')

@section('contenidoPlantillaPrincipal')
<!-- Banner -->
@yield('bannerSeguro')
<!-- Fin Banner -->

<section>
  <div class="container">
    <div class="row">
      <!-- Lista Seguros-->
      <div class="d-none d-lg-block col-lg-4" id="seguros-list">
        @foreach($seguros as $grupoSeguros)
          <h4>{{ $grupoSeguros['titulo'] }}</h4>
          <ul>
            @foreach($grupoSeguros['seguros'] as $seguro)
              <li
                class="{{ Request::segment(2) == $seguro['slug'] ? 'active':'' }}">
                <a
                  href="{{ url('seguros/'.$seguro['slug']) }}">{{ $seguro['nombre'] }}</a>
              </li>
            @endforeach
          </ul>
        @endforeach
      </div>
      <!-- Fin Lista Seguros -->

      <!-- DropdownList de Seguros-->
      <div class="d-block d-lg-none col-12">
        <select name="seguros" id="sel-seguros" class="form-control mb-4">
          <option value="" selected>-- Escoja la solicitud que desea realizar --</option>
          @foreach($seguros as $grupoSeguros)
            <optgroup label="{{ $grupoSeguros['titulo'] }}">
              @foreach($grupoSeguros['seguros'] as $seguro)
                <option
                  data-href="{{ url('seguros/'. $seguro['slug']) }}">
                  {{ $seguro['nombre'] }}</option>
              @endforeach
            </optgroup>
          @endforeach
        </select>
      </div>
      <!-- Fin DropdownList de Seguros-->

      <!-- Informacion de Seguro -->
      <div class="col-12 col-lg-8" id="seguro-info-container">
        @yield('informacionSeguro')
      </div>
      <!-- Fin Informacion de Seguro -->
    </div>
  </div>
</section>
<!-- End Section -->
@endsection

@push('scripts')
<script src="{{ asset('js/web/seguros.js') }}"></script>
@endpush