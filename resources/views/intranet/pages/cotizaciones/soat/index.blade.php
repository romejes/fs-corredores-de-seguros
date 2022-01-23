@extends('intranet.layouts.dashboard') @section('content')
<!-- Content header -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">
          Solicitudes de Cotización
          <small>SOAT</small>
        </h1>
      </div>

      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">
            <a href="{{ URL::to('intranet') }}"><i class="fas fa-home"></i></a>
          </li>
          <li class="breadcrumb-item active">Cotización SOAT</li>
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
            <h4 class="card-title m-0">Listado de Solicitudes</h4>
          </div>
          <div class="card-body">
            <fieldset id="filter-compra-soat">
              <legend><strong><small>Filtros de búsqueda</small></strong></legend>
              <form class="form-inline mb-5">
                <label for="txt-cliente" class="my-1 mr-2">Cliente</label>
                <input type="text" name="cliente" id="txt-cliente" class="form-control mb-2 mr-sm-2">

                <label for="" class="my-1 mx-3">Estado de la solicitud</label>
                <select name="estado_solicitud" id="sel-estado_solicitud" class="form-control  mb-2 mr-sm-2">
                  <option value="-1">Todos</option>
                  <option value="1">En espera</option>
                  <option value="3">Atendidos</option>
                  <option value="4">Rechazados</option>
                </select>

                <button class="btn-primary btn mb-2 mr-2" type="button" id="btn-limpiar">
                  <i class="fas fa-eraser"></i> Limpiar filtros
                </button>
                <button class="btn-primary btn mb-2" type="button" id="btn-buscar">
                  <i class="fas fa-search"></i> Buscar
                </button>
              </form>
            </fieldset>
            <table class="table table-bordered" id="tbl-cotizaciones-soat"></table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push("scripts")
<script src="{{ asset('js/intranet/tables.js') }}"></script>
@endpush