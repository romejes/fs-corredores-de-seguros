<?php $__env->startSection('body-content'); ?>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar-->
    <?php echo $__env->make('intranet.layouts._navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!-- Sidebar -->
    <?php echo $__env->make('intranet.layouts._sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!-- Main Content-->
    <div class="content-wrapper">
      <?php echo $__env->yieldContent('content'); ?>
    </div>
  </div>
</body>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('intranet.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>