<?php $__env->startSection('contenidoPlantillaPrincipal'); ?>
<!-- Banner -->
<?php echo $__env->yieldContent('bannerSeguro'); ?>
<!-- Fin Banner -->

<section>
  <div class="container">
    <div class="row">
      <!-- Lista Seguros-->
      <div class="d-none d-lg-block col-lg-4" id="seguros-list">
        <?php $__currentLoopData = $seguros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grupoSeguros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <h4><?php echo e($grupoSeguros['titulo']); ?></h4>
          <ul>
            <?php $__currentLoopData = $grupoSeguros['seguros']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seguro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li
                class="<?php echo e(Request::segment(2) == $seguro['slug'] ? 'active':''); ?>">
                <a
                  href="<?php echo e(url('seguros/'.$seguro['slug'])); ?>"><?php echo e($seguro['nombre']); ?></a>
              </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
      <!-- Fin Lista Seguros -->

      <!-- DropdownList de Seguros-->
      <div class="d-block d-lg-none col-12">
        <select name="seguros" id="sel-seguros" class="form-control mb-4">
          <option value="" selected>-- Escoja la solicitud que desea realizar --</option>
          <?php $__currentLoopData = $seguros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grupoSeguros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <optgroup label="<?php echo e($grupoSeguros['titulo']); ?>">
              <?php $__currentLoopData = $grupoSeguros['seguros']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seguro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option
                  data-href="<?php echo e(url('seguros/'. $seguro['slug'])); ?>">
                  <?php echo e($seguro['nombre']); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </optgroup>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
      </div>
      <!-- Fin DropdownList de Seguros-->

      <!-- Informacion de Seguro -->
      <div class="col-12 col-lg-8" id="seguro-info-container">
        <?php echo $__env->yieldContent('informacionSeguro'); ?>
      </div>
      <!-- Fin Informacion de Seguro -->
    </div>
  </div>
</section>
<!-- End Section -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(asset('js/web/seguros.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('web.plantillas.principal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>