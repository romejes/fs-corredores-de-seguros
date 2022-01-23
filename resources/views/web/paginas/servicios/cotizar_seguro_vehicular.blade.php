@extends('web.plantillas.servicio')

@section('formularioServicio')
<h2>Cotizar Seguro Vehicular</h2>

<div class="wizard" id="cotizar_seguro_vehicular-wizard">
  <ul class="nav">
    <li>
      <a class="nav-link" href="#personal_info-tabpane">Paso 1 <br /><small>Datos personales</small></a>
    </li>
    <li>
      <a class="nav-link" href="#vehicle_info-tabpane">Paso 2 <br /><small>Datos del vehículo</small></a>
    </li>
    <li>
      <a class="nav-link" href="#insurance_company-tabpane">Paso 3 <br /><small>Aseguradora</small></a>
    </li>
  </ul>

  <form autocomplete="off" id="frm-cotizar_seguro_vehicular">
    <div class="tab-content">
      <!-- Datos personales -->
      <div class="tab-pane" id="personal_info-tabpane">
        @component('web.componentes.formularios.datos_personales', [
          "formulario" => 'frm-cotizar_seguro_vehicular',
          'tipoDocumentoIdentidad' => $tipoDocumentoIdentidad,
          ])
        @endcomponent
      </div>
      <!-- Fin datos personales -->

      <!-- Informacion de vehiculo -->
      <div class="tab-pane" id="vehicle_info-tabpane">
        @component('web.componentes.formularios.datos_vehiculo', [
          "formulario" => 'frm-cotizar_seguro_vehicular',
          'claseVehiculo' => $claseVehiculo,
          ])
        @endcomponent
      </div>
      <!-- Fin Informacion de vehiculo -->

      <!-- Informacion de aseguradoras -->
      <div class="tab-pane" id="insurance_company-tabpane">
        @include('web.componentes.formularios.aseguradoras')
      </div>
      <!-- Fin Informacion de aseguradoras -->
    </div>
  </form>
</div>
@endsection

@section('title')
Solicitudes - Cotizar Seguro Vehicular Todo Riesgo
@endsection

@push('scripts')
  <script src="{{ asset('js/web/servicios.js') }}"></script>
@endpush