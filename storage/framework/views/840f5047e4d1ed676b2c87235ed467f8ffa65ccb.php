<?php $__env->startSection('content'); ?>
<main>
  <!-- Heading Page -->
  <?php $__env->startComponent('web.components._heading-page'); ?>
    <img src="<?php echo e(asset('images/banners/banner_contacto.jpg')); ?>" alt="">
    <?php $__env->slot('headingTitle'); ?>
      Contáctanos
    <?php $__env->endSlot(); ?>
  <?php echo $__env->renderComponent(); ?>
  <!-- End Heading Page -->

  <!-- Section: Formulario de Contacto -->
  <section>
    <div class="section-container">
      <div class="section-row">
        <div class="section-heading col-12">
          <h2 class="section-title">Envíanos tus preguntas o sugerencias</h2>
        </div>
        <div class="section-body col-12">
          <form method="POST" id="frm-contact" class="form-row" novalidate>
            <div class="form-group col-lg-6">
              <label for="txt-nombres">Nombres y Apellidos</label>
              <input type="text" name="nombres-apellidos" id="txt-nombres-apellidos" class="form-control" required>
            </div>
            <div class="form-group col-lg-6">
              <label for="txt-asunto">Asunto</label>
              <input type="text" name="asunto" id="txt-asunto" class="form-control" required>
            </div>
            <div class="form-group col-lg-6">
              <label for="txt-email">Email</label>
              <input type="email" name="email" id="txt-email" class="form-control" required>
            </div>
            <div class="form-group col-lg-6">
              <label for="txt-telefono">Telefono</label>
              <input type="tel" name="telefono" id="txt-telefono" class="form-control" required>
            </div>
            <div class="form-group col-12">
              <label for="txt-comentario">Comentarios, quejas o sugerencias</label>
              <textarea name="comentario" id="txt-comentario" cols="30" rows="5" class="form-control"
                required></textarea>
            </div>
            <button class="button button-primary" type="button" id="btn-send">Enviar</button>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- End Section: Formulario de Contacto -->

  <!-- Section: Ubicacion -->
  <section id="section-contact-map">
    <div class="section-container">
      <div class="section-row">
        <div class="section-heading col-12">
          <h2 class="section-title">... o visita nuestra oficina</h2>
        </div>
      </div>
    </div>
    <div id="location-map" data-aos="fade-in"></div>
  </section>
  <!-- End Section: Ubicacion -->
</main>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('title'); ?>
Contacto
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>