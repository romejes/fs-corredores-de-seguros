<?php $__env->startSection('formularioServicio'); ?>
<!-- Form -->
<h2>Cotizar SOAT</h2>
<div class="wizard" id="cotizar_soat-wizard">
  <ul class="nav">
    <li>
      <a class="nav-link" href="#personal_info-tabpane">Paso 1 <br /><small>Datos personales</small></a>
    </li>
    <li>
      <a class="nav-link" href="#vehicle_info-tabpane">Paso 2 <br /><small>Datos del vehículo</small></a>
    </li>
    <li>
      <a class="nav-link" href="#quote_info-tabpane">Paso 3 <br /><small>Datos de la cotización</small></a>
    </li>
  </ul>

  <form autocomplete="off" id="frm-cotizar_soat">
    <div class="tab-content">

      <!-- Datos personales -->
      <div class="tab-pane" id="personal_info-tabpane">
        <?php $__env->startComponent('web.componentes.formularios.datos_personales', [
          "formulario" => 'frm-cotizar_soat',
          'tipoDocumentoIdentidad' => $tipoDocumentoIdentidad,
          ]); ?>
        <?php echo $__env->renderComponent(); ?>
      </div>
      <!-- Fin datos personales -->

      <!-- Informacion de vehiculo -->
      <div class="tab-pane" id="vehicle_info-tabpane">
        <?php $__env->startComponent('web.componentes.formularios.datos_vehiculo', [
          "formulario" => 'frm-cotizar_soat',
          ]); ?>
        <?php echo $__env->renderComponent(); ?>
      </div>
      <!-- Fin Informacion de vehiculo -->

      <!-- Informacion de aseguradoras -->
      <div class="tab-pane" id="quote_info-tabpane">
        <div class="container">

          <?php echo $__env->make('web.componentes.formularios.aseguradoras', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

          <fieldset class="form-group">
            <div class="row">
              <legend class="col-sm-5 col-form-label pt-0">¿Cuenta usted con un SOAT en este momento, o no?
              </legend>
              <div class="col-sm-7">
                <div class="form-check">
                  <input type="radio" name="tiene_soat" class="form-check-input" id="rad-tengo-soat" value="1" />
                  <label for="rad-tengo-soat" class="form-check-label">Si</label>
                </div>
                <div class="form-check">
                  <input type="radio" name="tiene_soat" class="form-check-input" id="rad-no-tengo-soat" value="0" />
                  <label for="rad-no-tengo-soat" class="form-check-label">No</label>
                </div>
              </div>
            </div>
          </fieldset>


          <div class="form-group row d-none">
            <label for="txt-fecha-vencimiento" class="col-sm-5 col-form-label">Ingrese la fecha de vencimiento
              de su SOAT actual (dia/mes/año)</label>
            <div class="col-sm-7">
              <input type="text" name="fecha_vencimiento" id="txt-fecha-vencimiento" class="form-control" required />
            </div>
          </div>
        </div>
        <!-- Fin Informacion de aseguradoras -->
      </div>
  </form>
</div>
<!-- End Form -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
Solicitudes - Cotizar SOAT
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
  <script src="<?php echo e(asset('js/web/servicios.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('web.plantillas.servicio', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>