<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>FS Corredores de Seguros | <?php echo $__env->yieldContent('title'); ?></title>

  <meta name="description" content="">
  
  <!-- Fonts -->
  <link rel="stylesheet" href="<?php echo e(asset('css/vendor.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('css/web.css')); ?>">

  <link rel="shortcut icon" href="<?php echo e(asset('favicon/favicon.ico')); ?>" type="image/x-icon">
</head>

<body>
  <?php echo $__env->make('web.layouts.main.sidenav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <div class="wrapper">
    <div class="wrapper-shadow"></div>
    <?php echo $__env->make('web.layouts.main.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->yieldContent('main_content'); ?>
    <?php echo $__env->make('web.layouts.main.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </div>

  <script src="<?php echo e(asset('js/web/vendor.js')); ?>"></script>
  <script src="<?php echo e(asset('js/web/manifest.js')); ?>"></script>
  <script src="<?php echo e(asset('js/web/app.js')); ?>"></script>

  <?php echo $__env->yieldPushContent('scripts'); ?>
</body>

</html>