@extends('intranet.layouts.dashboard') @section('content')
<!-- Content header -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">
          Solicitudes de Afiliacion
          <small>Seguro Estudiantil contra Accidentes</small>
        </h1>
      </div>

      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">
            <a href="{{ URL::to('intranet') }}"><i class="fas fa-home"></i></a>
          </li>
          <li class="breadcrumb-item">
            <a href="{{ URL::to('intranet/afiliaciones/seguro_estudiante') }}">Afiliacion al Seguro Estudiantil</a>
          </li>
          <li class="breadcrumb-item active">Ver detalle</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<!-- Main Content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <div class="float-sm-left">
              <h4 class="card-title m-0">Detalle de la solicitud</h4>
            </div>
            <div class="float-sm-right">
              <a class="btn btn-primary" href="{{ url('intranet/afiliaciones/seguro_estudiante') }}"><i
                  class="fas fa-arrow-left"></i> Ver Listado</a>
            </div>
          </div>
          <div class="card-body" id="detail-afiliacion-seguro-estudiante">
            @component('intranet.components.status_info_box', ['estadoSolicitud' =>
            $detalleAfiliacion->solicitud->IdEstadoSolicitud])
            @endcomponent
            <dl class="row">
              <dt class="col-sm-4">Código</dt>
              <dd class="col-sm-8">
                {{ $detalleAfiliacion->solicitud->Codigo}}
              </dd>
            </dl>
            <dl class="row">
              <dt class="col-sm-4">Solicitado Por</dt>
              <dd class="col-sm-8">{{ $detalleAfiliacion->solicitado_por}}</dd>
            </dl>
            <dl class="row">
              <dt class="col-sm-4">Sexo</dt>
              <dd class="col-sm-8">{{ $detalleAfiliacion->sexo_descripcion}}</dd>
            </dl>
            <dl class="row">
              <dt class="col-sm-4">País de procedencia</dt>
              <dd class="col-sm-8">{{ $detalleAfiliacion->pais->Nombre }}</dd>
            </dl>
            <dl class="row">
              <dt class="col-sm-4">Documento de Identidad</dt>
              <dd class="col-sm-8">
                {{ $detalleAfiliacion->documento_identidad}}
              </dd>
            </dl>
            <dl class="row">
              <dt class="col-sm-4">Estado civil</dt>
              <dd class="col-sm-8">{{ $detalleAfiliacion->EstadoCivil}}</dd>
            </dl>
            <dl class="row">
              <dt class="col-sm-4">Fecha de Nacimiento</dt>
              <dd class="col-sm-8">{{ $detalleAfiliacion->FechaNacimiento}}</dd>
            </dl>
            <dl class="row">
              <dt class="col-sm-4">Teléfono</dt>
              <dd class="col-sm-8">{{ $detalleAfiliacion->Telefono}}</dd>
            </dl>
            <dl class="row">
              <dt class="col-sm-4">Correo Electrónico</dt>
              <dd class="col-sm-8">{{ $detalleAfiliacion->Email}}</dd>
            </dl>
            <dl class="row">
              <dt class="col-sm-4">Voucher de pago</dt>
              <dd class="col-sm-8">
                <a href="{{ url('intranet/afiliaciones/seguro_estudiante/' . $detalleAfiliacion->solicitud->Codigo . '/adjuntos/' . $detalleAfiliacion->ImagenVoucher)}}"
                  target="_blank">Ver</a>
              </dd>
            </dl>
          </div>
          <div class="card-footer">
            <div class="float-sm-right">
              @if ($detalleAfiliacion->solicitud->IdEstadoSolicitud == 1)
              <button class="btn btn-danger" id="btn-rechazar">Rechazar</button>
              <button class="btn btn-success" id="btn-marcar-atendido">
                Marcar como atendido
              </button>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection