<?php $__env->startSection('contenidoPlantillaPrincipal'); ?>
<main>
  <!-- Banner-->
  <?php $__env->startComponent('web.componentes.banner', ["imagenBanner" => 'banner_clientes.jpg', 'tituloBanner' => "Nuestros Clientes"]); ?>
  <?php echo $__env->renderComponent(); ?>
  <!-- Fin Banner -->

  <!-- Seccion Entidades Publicas -->
  <section>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="clr-blue text-center">Entidades Públicas</h2>
        </div>
        <div class="col-12">
          <div class="cards-container clients-cards-container">
          <?php $__currentLoopData = $clientes["publicas"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entidadPublica): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $__env->startComponent("web.componentes.card", [
              "imagen" => 'clientes/' . $entidadPublica['logo'],
              "titulo" => $entidadPublica['nombre']
            ]); ?>
            <?php echo $__env->renderComponent(); ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Fin Seccion Entidades Publicas -->

  <!-- Seccion Entidades Privadas -->
  <section>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="clr-blue text-center">Entidades Privadas</h2>
        </div>
        <div class="col-12">
          <div class="cards-container clients-cards-container">
          <?php $__currentLoopData = $clientes["privadas"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entidadPrivada): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $__env->startComponent("web.componentes.card", [
              "imagen" => is_null($entidadPrivada['logo']) ? 'no_logo.png' : 'clientes/' . $entidadPrivada['logo'],
              "titulo" => $entidadPrivada['nombre']
            ]); ?>
            <?php echo $__env->renderComponent(); ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Fin Seccion Entidades Privadas -->
</main>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('title'); ?>
Clientes
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.plantillas.principal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>