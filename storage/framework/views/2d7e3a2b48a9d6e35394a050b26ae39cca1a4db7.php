<?php $__env->startSection('contenidoPlantillaPrincipal'); ?>

<!-- Banner -->
<?php $__env->startComponent('web.componentes.banner', [ "imagenBanner" => "banner_servicios.jpg", "tituloBanner" => "Solicite su seguro"]); ?>
<?php echo $__env->renderComponent(); ?>
<!-- Fin Banner -->

<section>
  <div class="container">
    <div class="row">
      <!-- Lista Servicios -->
      <div class="d-none d-lg-block col-lg-4" id="servicios-list">
        <?php $__currentLoopData = $servicios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servicio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <h4><?php echo e($servicio['seguro']); ?></h4>
          <ul>
            <?php $__currentLoopData = $servicio['opciones']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opcion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li
                class="<?php echo e(Request::segment(2) == $opcion['slug'] ? 'active':''); ?>">
                <a
                  href="<?php echo e(url('servicios_en_linea/'.$opcion['slug'])); ?>"><?php echo e($opcion['nombre']); ?></a>
              </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
      <!-- Fin Lista Servicios -->

      <!-- DropdownList de Servicios-->
      <div class="d-block d-lg-none col-12">
        <select name="servicios" id="sel-servicios" class="form-control mb-4">
          <option value="" selected>-- Escoja la solicitud que desea realizar --</option>
          <?php $__currentLoopData = $servicios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servicio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <optgroup label="<?php echo e($servicio['seguro']); ?>">
              <?php $__currentLoopData = $servicio['opciones']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opcion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option
                  data-href="<?php echo e(url('servicios_en_linea/'. $opcion['slug'])); ?>">
                  <?php echo e($opcion['nombre']); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </optgroup>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
      </div>
      <!-- Fin DropdownList de Servicios-->

      <!-- Formulario de Solicitud -->
      <div class="col-12 col-lg-8" id="servicio-detail-container">
        <?php echo $__env->yieldContent('formularioServicio'); ?>
      </div>
      <!-- Fin Formulario de Solicitud-->
    </div>
  </div>
</section>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(asset('js/web/servicios.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('web.plantillas.principal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>