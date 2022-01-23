<nav class="navbar navbar-desktop">
  <ul class="menu">
    <li class="has-submenu">
      <a
        class="<?php echo e(Request::segment(1) === 'seguros' ? 'active' : ''); ?>">Seguros
      </a>
      <div class="submenu">
        <div class="container">
          <div class="row">
            <ul class="nav menu-tab col-3">
              <?php $__currentLoopData = $seguros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indice => $grupoSeguro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                  <a data-toggle="tab" data-target="#seguros-<?php echo e($indice); ?>"
                    class="nav-link <?php echo e($indice == 0 ? 'active':''); ?>"><?php echo e($grupoSeguro['titulo']); ?>

                  </a>
                </li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <div class="tab-content col">
              <?php $__currentLoopData = $seguros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indice => $grupoSeguro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div id="seguros-<?php echo e($indice); ?>"
                  class="tab-pane <?php echo e($indice == 0 ? 'active':''); ?>">
                  <ul>
                    <?php $__currentLoopData = $grupoSeguro['seguros']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seguro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li><a
                          href="<?php echo e(asset('seguros/'. $seguro['slug'])); ?>"><?php echo e($seguro['nombre']); ?></a>
                      </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </div>
        </div>
      </div>
    </li>
    <li><a
        class="<?php echo e(Request::segment(1) === 'servicios_en_linea' ? 'active' : ''); ?>"
        href="<?php echo e(asset('servicios_en_linea')); ?>">Servicios en linea</a>
    </li>
    <li><a
        class="<?php echo e(Request::segment(1) === 'nosotros' ? 'active' : ''); ?>"
        href="<?php echo e(asset('nosotros')); ?>">Nosotros</a></li>
    <li><a
        class="<?php echo e(Request::segment(1) === 'clientes' ? 'active' : ''); ?>"
        href="<?php echo e(asset('clientes')); ?>">Clientes</a></li>
    <li><a
        class="<?php echo e(Request::segment(1) === 'contacto' ? 'active' : ''); ?>"
        href="<?php echo e(asset('contacto')); ?>">Contacto</a></li>
    <li><a href="<?php echo e(asset('intranet')); ?>" target="_blank"><i class="fa fa-lock"></i></a></li>
  </ul>
</nav>