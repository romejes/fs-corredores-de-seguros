@extends('web.plantillas.servicio')

@section('formularioServicio')
<h2> Afiliación a Seguro Estudiantil contra Accidentes</h2>
<div class="wizard" id="seguro_estudiante-wizard">
  <ul class="nav">
    <li>
      <a class="nav-link" href="#personal_info-tabpane">Paso 1 <br /><small>Datos personales</small></a>
    </li>
    <li>
      <a class="nav-link" href="#payment_info-tabpane">Paso 2 <br /><small>Información de pago</small></a>
    </li>
  </ul>

  <form autocomplete="off" id="frm-afiliar-seguro-estudiante">
    <div class="tab-content">
      <!-- Datos personales -->
      <div class="tab-pane" id="personal_info-tabpane">
        @component('web.componentes.formularios.datos_personales', [
          "formulario" => 'frm-afiliar-seguro-estudiante',
          'paises' => $paises,
          'tipoDocumentoIdentidad' => $tipoDocumentoIdentidad,
          ])
        @endcomponent
      </div>
      <!-- Fin datos personales -->

      <!-- Informacion de pago -->
      <div class="tab-pane" id="payment_info-tabpane">
        @include('web.componentes.formularios.seguro_estudiante.pago')
      </div>
      <!-- Fin Informacion de pago -->
    </div>
  </form>
</div>
@endsection

@section('title')
Servicios en Linea - Afiliacion a Seguro Estudiantil contra Accidentes
@endsection

@push('scripts')
  <script src="{{ asset('js/web/servicios.js') }}"></script>
@endpush