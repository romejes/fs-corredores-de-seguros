<?php $__env->startSection('body-content'); ?>

<body>
  <div class="login-page">
    <div class="login-box">
      <!-- Logo -->
      <div class="login-logo">
        <img src="<?php echo e(asset('images/logo.svg')); ?>" alt="FS Corredores de Seguros" width="200">
      </div>
      <!-- End Logo -->

      <!-- Login Box -->
      <div class="card">
        <div class="card-body login-card-body">
          <form id="frm-login" autocomplete="off">
            <?php echo e(csrf_field()); ?>

            <div class="form-group mb-3">
              <div class="input-group">
                <input type="text" name="usuario" id="txt-usuario" class="form-control" placeholder="Usuario"
                  required />
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group mb-3">
              <div class="input-group">
                <input type="password" name="contrasena" id="txt-contrasena" class="form-control"
                  placeholder="Contraseña" required />
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
            </div>


            <div class="row">
              <button type="button" id="btn-login" class="btn btn-primary btn-block">
                <i class="fas fa-sign-in-alt"></i> Iniciar Sesión
              </button>
            </div>
          </form>
        </div>
      </div>
      <!-- End Login Box -->
    </div>
  </div>
</body>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('intranet.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>