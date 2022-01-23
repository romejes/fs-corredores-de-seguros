<?php $__env->startSection('contenidoPlantillaPrincipal'); ?>
<!-- Carousel -->
<?php $__env->startComponent('web.componentes.carousel', compact('imagenesCarousel')); ?>
<?php echo $__env->renderComponent(); ?>
<!-- Fin Carousel -->

<!-- Seccion Nuestros Seguros -->
<section class="bgc-white">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="clr-blue text-center">Nuestros Seguros</h2>
      </div>
      <div class="col-12">
        <div class="cards-container seguros-cards-container">
          <?php $__currentLoopData = $segurosPrincipales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seguro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $__env->startComponent("web.componentes.card", [
              "imagen" => 'seguros/' . $seguro["imagen_miniatura"],
              "titulo" => $seguro['nombre'],
              "descripcion" => $seguro['resumen']
            ]); ?>
              <?php $__env->slot('botones'); ?>
                <a href="<?php echo e(url('seguros/' . $seguro['slug'])); ?>" class="button button-primary">Mas información</a>
              <?php $__env->endSlot(); ?>
            <?php echo $__env->renderComponent(); ?>       
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
      <div class="col-12 text-center">
        <a href="<?php echo e(url('seguros')); ?>" class="button button-primary mt-3">Ver todos los seguros</a>
      </div>
    </div>
  </div>
</section>
<!-- Fin Seccion Nuestros Seguros -->

<!-- Seccion: Buscas SOAT -->
<section class="bgc-blue">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="text-center clr-white">¿Necesitas un SOAT?<br />Tranquilo, nosotros lo tenemos</h2>
      </div>
      <div class="col-12 text-center">
        <a href="<?php echo e(url('solicitudes/cotizar_soat')); ?>" data-aos="fade-right" class="button button-alt m-2">Cotiza aquí</a>
        <a href="<?php echo e(url('solicitudes/comprar_soat')); ?>" data-aos="fade-left" class="button button-alt m-2">Compra aquí</a>
      </div>
    </div>
  </div>
</section>
<!-- Fin Seccion: Buscas SOAT -->

<!-- Seccion: Compañias de Seguros -->
<section class="bgc-grey">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="clr-blue text-center">Trabajamos con las principales aseguradoras del país</h2>
      </div>
      <div class="col-12">
        <div class="wrapper-companias_seguro">
          <img data-aos="fade-up" class="logo-compania_seguro" src="<?php echo e(asset('images/aseguradoras/mapfre.svg')); ?>"
            alt="MAPFRE" />
          <img data-aos="fade-up" class="logo-compania_seguro"
            src="<?php echo e(asset('images/aseguradoras/lapositivaseguros.svg')); ?>" alt="La Positiva" />
          <img data-aos="fade-up" class="logo-compania_seguro" src="<?php echo e(asset('images/aseguradoras/pacifico.svg')); ?>"
            alt="Pacífico" />
          <img data-aos="fade-up" class="logo-compania_seguro" src="<?php echo e(asset('images/aseguradoras/rimac.svg')); ?>"
            alt="Rimac" />
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Fin Seccion: Compañias de Seguros -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?> Pagina de Inicio <?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(asset('js/web/inicio.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('web.plantillas.principal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>