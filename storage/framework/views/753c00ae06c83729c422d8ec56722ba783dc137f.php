 <?php $__env->startSection('content'); ?>
<main>
  <!-- Heading Page-->
  <?php $__env->startComponent('web.components._heading-page'); ?>
    <img src="<?php echo e(asset('images/banners/banner_clientes.jpg')); ?>" alt="">
    <?php $__env->slot('headingTitle'); ?>
      Nuestros clientes
    <?php $__env->endSlot(); ?>
  <?php echo $__env->renderComponent(); ?>
  <!-- End Heading Page -->

  <!-- Section Entidades Publicas -->
  <section>
    <div class="section-container">
      <div class="section-row">
        <div class="section-heading col-12">
          <h2 class="section-title">Entidades Públicas</h2>
        </div>
        <div class="section-body col-12">
          <div class="wrapper-card wrapper-customer">
            <?php $__currentLoopData = $clientes["publicas"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entidadPublica): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card customer-card" data-aos="fade-up">
              <img src="<?php echo e(asset("images/clientes/" . $entidadPublica["logo"])); ?>" alt="<?php echo e($entidadPublica['nombre']); ?>">
              <div class="card-body">
                <p><?php echo e($entidadPublica['nombre']); ?></p>
              </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Section Entidades Publicas -->

  <!-- Section Entidades Privadas -->
  <section>
    <div class="section-container">
      <div class="section-row">
        <div class="section-heading col-12">
          <h2 class="section-title">Entidades Públicas</h2>
        </div>
        <div class="section-body col-12">
          <div class="wrapper-card wrapper-customer">
            <?php $__currentLoopData = $clientes["privadas"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entidadPrivada): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card customer-card" data-aos="fade-up">
              <?php if(is_null($entidadPrivada["logo"])): ?>
              <img src="<?php echo e(asset("images/no_logo.png")); ?>" alt="Sin logo disponible">    
              <?php else: ?>
              <img src="<?php echo e(asset("images/clientes/" . $entidadPrivada["logo"])); ?>" alt="<?php echo e($entidadPrivada['nombre']); ?>">
              <?php endif; ?>
              <div class="card-body">
                <p><?php echo e($entidadPrivada['nombre']); ?></p>
              </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Section Entidades Publicas -->
</main>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('title'); ?>
Clientes
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>