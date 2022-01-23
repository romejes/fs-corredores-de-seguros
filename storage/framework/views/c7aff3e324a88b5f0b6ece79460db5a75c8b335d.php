<div class="card">
  <?php if(isset($imagen)): ?>
  <img class="card-img-top" src="<?php echo e(asset('images/' . $imagen)); ?>" alt="<?php echo e($titulo); ?>">
  <?php endif; ?>
  
  <div class="card-body">
    <h4 class="card-title"><?php echo e($titulo); ?></h4>
    <?php if(isset($descripcion)): ?>
    <p class="card-text"><?php echo e($descripcion); ?></p>
    <?php endif; ?>
  </div>

  <?php if(isset($botones)): ?>
  <div class="card-footer">
    <?php echo e($botones); ?>

  </div>      
  <?php endif; ?>
</div>