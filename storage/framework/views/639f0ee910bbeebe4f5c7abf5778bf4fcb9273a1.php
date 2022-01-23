 <?php $__env->startSection('content'); ?>
<main>
  <!-- Heading Page -->
  <?php $__env->startComponent('web.components._heading-page'); ?> 
    <?php $__env->slot('title'); ?>
    Pagina no encontrada  
    <?php $__env->endSlot(); ?>
  <?php echo $__env->renderComponent(); ?>
  <!-- End Heading Page -->

  <!-- Section -->
  <section id="section-not-found">
    <div class="section-container">
      <div class="section-row">
        <div class="section-body col-12">
          <i class="far fa-frown fa-10x" id="icon-not-found"></i>
          <p id="message-not-found">Lo sentimos, la página que intenta visitar no existe</p>
        </div>
      </div>
    </div>
  </section>
  <!-- End Section -->
</main>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('title'); ?>
Página no encontrada
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>