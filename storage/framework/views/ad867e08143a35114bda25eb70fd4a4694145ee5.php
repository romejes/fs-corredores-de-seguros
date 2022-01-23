<?php $__env->startSection('contenidoPlantillaPrincipal'); ?>
  <!-- Banner-->
  <?php $__env->startComponent('web.componentes.banner', ["imagenBanner" => 'banner_seguros.jpg', 'tituloBanner' => "Nuestros Seguros"]); ?>
  <?php echo $__env->renderComponent(); ?>
  <!-- Fin Banner -->

  <!-- Section -->
  <?php $__currentLoopData = $seguros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grupoSeguro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <section>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="clr-blue text-center"><?php echo e($grupoSeguro['titulo']); ?></h2>        
        </div>
        <div class="col-12">
          <div class="seguros-cards-container cards-container">
            <?php $__currentLoopData = $grupoSeguro['seguros']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seguro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $__env->startComponent("web.componentes.card", [
              "imagen" => 'seguros/' . $seguro["imagen_miniatura"],
              "titulo" => $seguro['nombre']
            ]); ?>
              <?php $__env->slot('botones'); ?>
                <a href="<?php echo e(url('seguros/' . $seguro['slug'])); ?>" class="button button-primary">Mas información</a>
              <?php $__env->endSlot(); ?>
            <?php echo $__env->renderComponent(); ?>       
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
Seguros
<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.plantillas.principal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>