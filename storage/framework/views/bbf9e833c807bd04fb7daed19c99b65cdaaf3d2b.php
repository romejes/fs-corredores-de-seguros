<?php $__env->startSection('formularioServicio'); ?>
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
        <?php $__env->startComponent('web.componentes.formularios.datos_personales', [
          "formulario" => 'frm-afiliar-seguro-estudiante',
          'paises' => $paises,
          'tipoDocumentoIdentidad' => $tipoDocumentoIdentidad,
          ]); ?>
        <?php echo $__env->renderComponent(); ?>
      </div>
      <!-- Fin datos personales -->

      <!-- Informacion de pago -->
      <div class="tab-pane" id="payment_info-tabpane">
        <?php echo $__env->make('web.componentes.formularios.seguro_estudiante.pago', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      </div>
      <!-- Fin Informacion de pago -->
    </div>
  </form>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
Servicios en Linea - Afiliacion a Seguro Estudiantil contra Accidentes
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
  <script src="<?php echo e(asset('js/web/servicios.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('web.plantillas.servicio', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>