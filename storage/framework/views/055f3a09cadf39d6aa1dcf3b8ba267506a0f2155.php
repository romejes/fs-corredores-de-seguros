 <?php $__env->startSection('content'); ?>
<!-- Content header -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">
          Solicitudes de Cotización
          <small>Seguro Vehicular Todo Riesgo</small>
        </h1>
      </div>

      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">
            <a href="<?php echo e(URL::to('intranet')); ?>"><i class="fas fa-home"></i></a>
          </li>
          <li class="breadcrumb-item">
            <a href="<?php echo e(URL::to('intranet/cotizaciones/soat')); ?>"
              >Cotización Seguro Vehicular Todo Riesgo</a
            >
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
              <a
                class="btn btn-primary"
                href="<?php echo e(url('intranet/cotizaciones/vehiculo_todo_riesgo')); ?>"
                ><i class="fas fa-arrow-left"></i> Ver Listado</a
              >
            </div>
          </div>
          <div class="card-body" id="detail-cotizacion-vehiculo-todo-riesgo">
            <?php $__env->startComponent('intranet.components.status_info_box', ['estadoSolicitud' =>
            $detalleCotizacion->solicitud->IdEstadoSolicitud]); ?>
            <?php echo $__env->renderComponent(); ?>
            <dl class="row">
              <dt class="col-sm-4">Código</dt>
              <dd class="col-sm-8">
                <?php echo e($detalleCotizacion->solicitud->Codigo); ?>

              </dd>
            </dl>
            <dl class="row">
              <dt class="col-sm-4">Solicitado Por</dt>
              <dd class="col-sm-8"><?php echo e($detalleCotizacion->solicitado_por); ?></dd>
            </dl>
            <dl class="row">
              <dt class="col-sm-4">N° Documento de Identidad</dt>
              <dd class="col-sm-8">
                <?php echo e($detalleCotizacion->documento_identidad); ?>

              </dd>
            </dl>
            <dl class="row">
              <dt class="col-sm-4">Teléfono</dt>
              <dd class="col-sm-8">
                <?php echo e(!$detalleCotizacion->Telefono ? "-" : $detalleCotizacion->Telefono); ?>

              </dd>
            </dl>
            <dl class="row">
              <dt class="col-sm-4">Correo Electrónico</dt>
              <dd class="col-sm-8"><?php echo e($detalleCotizacion->Email); ?></dd>
            </dl>

            <dl class="row">
              <dt class="col-sm-4">Año de fabricación del vehículo</dt>
              <dd class="col-sm-8"><?php echo e($detalleCotizacion->AnioVehiculo); ?></dd>
            </dl>

            <dl class="row">
              <dt class="col-sm-4">Placa</dt>
              <dd class="col-sm-8"><?php echo e($detalleCotizacion->Placa); ?></dd>
            </dl>

            <dl class="row">
              <dt class="col-sm-4">Uso</dt>
              <dd class="col-sm-8"><?php echo e($detalleCotizacion->Uso); ?></dd>
            </dl>

            <dl class="row">
              <dt class="col-sm-4">Asientos</dt>
              <dd class="col-sm-8"><?php echo e($detalleCotizacion->Asientos); ?></dd>
            </dl>

            <dl class="row">
              <dt class="col-sm-4">Asientos</dt>
              <dd class="col-sm-8">
                <?php echo e($detalleCotizacion->claseVehiculo->Descripcion); ?>

              </dd>
            </dl>

            <dl class="row">
              <dt class="col-sm-4">Marca</dt>
              <dd class="col-sm-8"><?php echo e($detalleCotizacion->Marca); ?></dd>
            </dl>

            <dl class="row">
              <dt class="col-sm-4">Modelo</dt>
              <dd class="col-sm-8"><?php echo e($detalleCotizacion->Modelo); ?></dd>
            </dl>

            <dl class="row">
              <dt class="col-sm-4">Costo del vehículo</dt>
              <dd class="col-sm-8"><?php echo e($detalleCotizacion->Costo); ?></dd>
            </dl>

            <dl class="row">
              <dt class="col-sm-4">Compañia de Seguros</dt>
              <dd class="col-sm-8"><?php echo e($detalleCotizacion->CompaniaSeguro); ?></dd>
            </dl>
          </div>
          <div class="card-footer">
            <div class="float-sm-right">
              <?php if($detalleCotizacion->solicitud->IdEstadoSolicitud == 1): ?>
              <button class="btn btn-danger" id="btn-rechazar">Rechazar</button>
              <button class="btn btn-success" id="btn-marcar-atendido">
                Marcar como atendido
              </button>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('intranet.layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>