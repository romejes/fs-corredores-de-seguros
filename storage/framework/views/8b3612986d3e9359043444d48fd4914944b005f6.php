 <?php $__env->startSection('content'); ?>
<main>
  <!-- Heading -->
  <?php $__env->startComponent('web.components._heading-page'); ?>
    <img src="<?php echo e(asset('images/banners/banner_seguros.jpg')); ?>" alt="">
    <?php $__env->slot('headingTitle'); ?>
      Nuestros seguros
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
              <nav class="treeview treeview-insurances">
                <ul class="treeview-root">
                  <?php $__currentLoopData = $seguros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seguro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li class="treeview-root-group">
                    <span class="treeview-item"><?php echo e($seguro['title']); ?></span>
                    <ul>
                      <?php $__currentLoopData = $seguro['seguros']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detalle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li>
                        <a href="<?php echo e(url('seguros/'.$detalle['slug'])); ?>"
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
              <select name="seguros" id="sel-insurances" class="form-control ">
                <option value="" selected>-- Escoja el seguro que desea revisar --</option>
                <?php $__currentLoopData = $seguros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seguro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <optgroup label="<?php echo e($seguro['title']); ?>">
                  <?php $__currentLoopData = $seguro['seguros']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detalle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option data-href="<?php echo e(url('seguros/'. $detalle['slug'])); ?>"><?php echo e($detalle['name']); ?></option>
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
              <?php echo $__env->yieldContent('insurance-content'); ?>
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