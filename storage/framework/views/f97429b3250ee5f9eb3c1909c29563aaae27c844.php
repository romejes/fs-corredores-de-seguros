<header>
  <div class="container">
    <div class="row">
      <div class="col-12 d-flex justify-content-between align-items-stretch">
        <!-- Logo FS -->
        <a href="<?php echo e(url('/')); ?>">
          <img src="<?php echo e(asset('images/logo.svg')); ?>" alt="FS Corredores de Seguros" id="header-logo">
        </a>
        <!-- Fin Logo FS -->

        <!-- Menu -->
        <?php echo $__env->make('web.plantillas.principal.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- Fin Menu -->

        <!-- Boton menu smartphone -->
        <button id="btn-menu">
          <i class="fas fa-bars fa-2x"></i>
        </button>
        <!-- Fin Boton menu smartphone -->
      </div>
    </div>
  </div>
</header>