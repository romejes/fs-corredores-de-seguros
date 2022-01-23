<header>
  <div class="container">
    <!-- Logo -->
    <a href="<?php echo e(url('/')); ?>">
      <img src="<?php echo e(asset('images/logo.svg')); ?>" alt="FS Corredores de Seguros" id="company-logo-header">
    </a>
    <!-- End logo -->

    <!-- Navbar -->
    <nav class="navbar">

      <!-- Menu button -->
      <button id="btn-menu" class="button" type="button">
        <i class="fas fa-bars fa-2x"></i>
      </button>
      <!-- End Menu button-->

      <!-- Navbar Links -->
      <?php echo $__env->make('web.layouts.main.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <!-- End Navbar Links -->
    </nav>
    <!-- End Navbar -->
  </div>
</header>