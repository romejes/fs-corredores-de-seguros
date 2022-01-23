<div class="banner">
  <img src="<?php echo asset('images/banners/' . $imagenBanner ); ?>" alt="">
  <div class="banner-text-container">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h1><?php echo e($tituloBanner); ?></h1>
          <?php if(isset($subtituloBanner)): ?>
            <h3><?php echo e($subtituloBanner); ?></h3>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>