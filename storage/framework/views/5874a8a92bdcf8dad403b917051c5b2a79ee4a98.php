<div class="carousel-slide" data-img="<?php echo e(asset('images/carousel/' . $imagenPequena)); ?>"
  data-md-img="<?php echo e(asset('images/carousel/' . $imagenGrande)); ?>">
  <div class="carousel-slide-text">
    <h2 class="carousel-text-animated"><?php echo e($titulo); ?></h2>
    <p class="carousel-text-animated">
      <?php echo e($descripcion); ?>

    </p>
    <?php $__currentLoopData = $botones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $boton): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <a class="carousel-text-animated button button-primary"
      href="<?php echo e(asset($boton['url'])); ?>"><?php echo e($boton['nombre']); ?></a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
</div>