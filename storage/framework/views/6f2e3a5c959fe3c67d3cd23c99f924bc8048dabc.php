<div class="carousel owl-carousel">
  <?php $__currentLoopData = $imagenesCarousel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $imagen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="carousel-slide"
      data-img="<?php echo e(asset('images/carousel/' . $imagen['imagen_pequena'])); ?>"
      data-md-img="<?php echo e(asset('images/carousel/' . $imagen['imagen_grande'])); ?>">
      <div class="carousel-slide-caption">
        <h2 class="carousel-slide-title"><?php echo e($imagen['titulo']); ?></h2>
        <p><?php echo e($imagen['descripcion']); ?></p>
        <?php $__currentLoopData = $imagen['botones']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $boton): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <a class="button button-primary"
            href="<?php echo e(asset($boton['url'])); ?>"><?php echo e($boton['nombre']); ?></a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>