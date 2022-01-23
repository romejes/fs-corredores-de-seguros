@extends('intranet.layouts.dashboard') @section('content')
<!-- Content header -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">
          Solicitudes de Compra
          <small>SOAT</small>
        </h1>
      </div>

      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">
            <a href="{{ URL::to('intranet') }}"><i class="fas fa-home"></i></a>
          </li>
          <li class="breadcrumb-item">
            <a href="{{ URL::to('intranet/compras/soat') }}">Compra SOAT</a>
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
              <a class="btn btn-primary" href="{{ url('intranet/compras/soat') }}"><i class="fas fa-arrow-left"></i>
                Ver Listado</a>
            </div>
          </div>
          <div class="card-body" id="detail-compra-soat">
            @component('intranet.components.status_info_box', ['estadoSolicitud' =>
            $detalleCompra->solicitud->IdEstadoSolicitud])
            @endcomponent
            <dl class="row">
              <dt class="col-sm-4">Código</dt>
              <dd class="col-sm-8">{{ $detalleCompra->solicitud->Codigo}}</dd>
            </dl>
            <dl class="row">
              <dt class="col-sm-4">Solicitado Por</dt>
              <dd class="col-sm-8">{{ $detalleCompra->solicitado_por}}</dd>
            </dl>
            <dl class="row">
              <dt class="col-sm-4">Fecha de Nacimiento</dt>
              <dd class="col-sm-8">{{ $detalleCompra->FechaNacimiento}}</dd>
            </dl>
            <dl class="row">
              <dt class="col-sm-4">Teléfono</dt>
              <dd class="col-sm-8">
                {{ !$detalleCompra->Telefono ? "-" : $detalleCompra->Telefono}}
              </dd>
            </dl>
            <dl class="row">
              <dt class="col-sm-4">Correo Electrónico</dt>
              <dd class="col-sm-8">{{ $detalleCompra->Email}}</dd>
            </dl>
            <dl class="row">
              <dt class="col-sm-4">N° Documento de Identidad</dt>
              <dd class="col-sm-8">{{ $detalleCompra->documento_identidad}}</dd>
            </dl>
            <dl class="row">
              <dt class="col-sm-4">Tipo de Compra</dt>
              <dd class="col-sm-8">{{ $detalleCompra->TipoCompra}}</dd>
            </dl>

            @if ($detalleCompra->TipoCompra === 'Adquisición')
            <dl class="row">
              <dt class="col-sm-4">Dirección de envío</dt>
              <dd class="col-sm-8">{{ $detalleCompra->Direccion }}</dd>
            </dl>

            <dl class="row">
              <dt class="col-sm-4">Placa</dt>
              <dd class="col-sm-8">{{ $detalleCompra->Placa }}</dd>
            </dl>

            <dl class="row">
              <dt class="col-sm-4">Asientos</dt>
              <dd class="col-sm-8">{{ $detalleCompra->Asientos }}</dd>
            </dl>

            <dl class="row">
              <dt class="col-sm-4">Uso</dt>
              <dd class="col-sm-8">{{ $detalleCompra->Uso }}</dd>
            </dl>

            <dl class="row">
              <dt class="col-sm-4">Compañia de Seguros</dt>
              <dd class="col-sm-8">{{ $detalleCompra->CompaniaSeguro }}</dd>
            </dl>

            <dl class="row">
              <dt class="col-sm-4">Documento de Identidad</dt>
              <dd class="col-sm-8">
                <a href="{{ url('intranet/afiliaciones/seguro_estudiante/' . $detalleCompra->solicitud->Codigo . '/adjuntos/' .$detalleCompra->ImagenDni)}}"
                  target="_blank">Ver</a>
              </dd>
            </dl>

            <dl class="row">
              <dt class="col-sm-4">Tarjeta de Propiedad</dt>
              <dd class="col-sm-8">
                <a target="_blank"
                  href="{{ url('intranet/afiliaciones/seguro_estudiante/' . $detalleCompra->solicitud->Codigo . '/adjuntos/' . $detalleCompra->ImagenTarjetaPropiedad)}}">Ver</a>
              </dd>
            </dl>
            @else
            <dl class="row">
              <dt class="col-sm-4">Póliza del seguro</dt>
              <dd class="col-sm-8">
                <a href="{{ url('intranet/afiliaciones/seguro_estudiante/' . $detalleCompra->solicitud->Codigo . '/adjuntos/' .$detalleCompra->ImagenPoliza)}}"
                  target="_blank">Ver</a>
              </dd>
            </dl>
            @endif

          </div>
          <div class="card-footer">
            <div class="float-sm-right">
              @if ($detalleCompra->solicitud->IdEstadoSolicitud == 1)
              <button class="btn btn-danger" id="btn-rechazar">Rechazar</button>
              <button class="btn btn-success" id="btn-marcar-atendido">Marcar como atendido</button>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection