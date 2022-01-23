 <?php $__env->startSection('content'); ?>
<main>
  <!-- Heading -->
  <?php $__env->startComponent('web.components._heading-page'); ?>
    <img src="<?php echo e(asset('images/banners/banner_servicios.jpg')); ?>" alt="">
    <?php $__env->slot('headingTitle'); ?>
      Solicite su seguro
    <?php $__env->endSlot(); ?>
  <?php echo $__env->renderComponent(); ?>
  <!-- End Heading-->

  <!-- Section -->
  <section>
    <div class="section-container">
      <div class="section-row">
        <div class="section-body col-12">
          <!-- Split Container-->
          <div class="split-container">
            <!-- Left Side -->
            <div class="left-half">
              <!-- Nav for large screens -->
              <nav class="treeview treeview-requests">
                <ul class="treeview-root">
                  <?php $__currentLoopData = $solicitudes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $solicitud): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li class="treeview-root-group">
                    <span class="treeview-item"><?php echo e($solicitud['seguro']); ?></span>
                    <ul>
                      <?php $__currentLoopData = $solicitud['opciones']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detalle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li>
                        <a href="<?php echo e(url('solicitudes/'.$detalle['slug'])); ?>"
                          class="<?php echo e(Request::segment(2) == $detalle['slug'] ? 'active':''); ?>"><?php echo e($detalle['name']); ?></a>
                      </li>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                  </li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
              </nav>
              <!-- End Nav for large screens -->

              <!-- Nav for small screens -->
              <select name="seguros" id="sel-requests" class="form-control ">
                <option value="" selected>-- Escoja la solicitud que desea realizar --</option>
                <?php $__currentLoopData = $solicitudes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $solicitud): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <optgroup label="<?php echo e($solicitud['seguro']); ?>">
                  <?php $__currentLoopData = $solicitud['opciones']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detalle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option data-href="<?php echo e(url('solicitudes/'. $detalle['slug'])); ?>"><?php echo e($detalle['name']); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </optgroup>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
              <!-- End Nav for small screens -->
            </div>
            <!-- End Left Side -->

            <div class="divide"></div>

            <!-- Right Side -->
            <div class="right-half">
              <?php echo $__env->yieldContent('request-content'); ?>
            </div>
            <!-- End Right Side -->
          </div>
          <!-- End Split Container-->
        </div>
      </div>
    </div>
  </section>
  <!-- End Section -->
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>