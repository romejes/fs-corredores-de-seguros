<?php $__env->startSection('contenidoPlantillaPrincipal'); ?>
<main>
  <!-- Heading Page-->
  <?php $__env->startComponent('web.componentes.banner_pagina', ["imagenBanner" => 'banner_servicios.jpg', "tituloBanner" => "Solicite su seguro"]); ?>
  <?php echo $__env->renderComponent(); ?>
  <!-- End Heading Page-->

  <!-- Section -->
  <section>
    <div class="section-container">
      <div class="section-row">
        <div class="section-body col-12">
          <div class="wrapper-card">
            <?php $__currentLoopData = $solicitudes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $solicitud): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card" data-aos="fade-up">
              <img src="<?php echo e(asset('images/seguros/'. $solicitud['picture'])); ?>" alt="">
              <div class="card-body">
                <h3 class="card-title"><?php echo e($solicitud['seguro']); ?></h3>
              </div>
              <div class="card-footer">
                <?php $__currentLoopData = $solicitud['opciones']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opcion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(url('solicitudes/' . $opcion['slug'])); ?>"
                  class="button button-primary"><?php echo e($opcion['name']); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Section -->
</main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
Solicitudes
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.plantillas.principal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>