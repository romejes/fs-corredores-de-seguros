<?php $__env->startSection('contenidoPlantillaPrincipal'); ?>
<main>
  <!-- Heading Page-->
  <?php $__env->startComponent('web.componentes.banner', ["imagenBanner" => 'banner_servicios.jpg', "tituloBanner" => "Solicite su seguro"]); ?>
  <?php echo $__env->renderComponent(); ?>
  <!-- End Heading Page-->

  <!-- Section -->
  <section>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="clr-blue text-center">¿Qué es lo que desea hacer?</h2>        
        </div>
        <div class="col-12">
          <div class="seguros-cards-container cards-container">
            <?php $__currentLoopData = $servicios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servicio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php $__env->startComponent("web.componentes.card", [
                "imagen" => 'seguros/' . $servicio["imagen_miniatura"],
                "titulo" => $servicio['seguro']
              ]); ?>
                <?php $__env->slot('botones'); ?>
                  <?php $__currentLoopData = $servicio['opciones']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opcion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(url('servicios_en_linea/' . $opcion['slug'])); ?>" class="button button-primary"><?php echo e($opcion['nombre']); ?></a>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php $__env->endSlot(); ?>

              <?php echo $__env->renderComponent(); ?>       
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
Servicios en Linea
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.plantillas.principal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>