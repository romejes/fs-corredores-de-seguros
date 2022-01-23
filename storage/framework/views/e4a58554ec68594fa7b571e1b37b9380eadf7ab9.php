<?php $__env->startSection('contenidoSolicitud'); ?>
<h2>Comprar SOAT</h2>
<article>
  <p>
    Solicite su SOAT electrónico a través de las compañias de seguros mostradas
    abajo. Haga click sobre las imágenes para acceder al formulario de compra.
  </p>
  <ul class="wrapper-compra-soat">
    <li>
      <a href="">
        <img
          src="<?php echo e(asset('images/aseguradoras/mapfre.svg')); ?>"
          alt="Comprar SOAT en MAPFRE"
        />
      </a>
    </li>
    <li>
      <a href="">
        <img
          src="<?php echo e(asset('images/aseguradoras/lapositivaseguros.svg')); ?>"
          alt="Comprar SOAT en La Positiva"
        />
      </a>
    </li>
  </ul>
</article>
<?php $__env->stopSection(); ?> 

<?php $__env->startSection('title'); ?> Solicitudes - Comprar SOAT <?php $__env->stopSection(); ?>

<?php echo $__env->make('web.plantillas.seguro_solicitud', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>