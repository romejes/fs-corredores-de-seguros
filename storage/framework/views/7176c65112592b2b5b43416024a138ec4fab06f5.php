<nav class="navbar navbar-mobile">
  <ul class="menu">
    <li class="has-submenu">
      <a class="<?php echo e(Request::segment(1) === 'seguros' ? 'active' : ''); ?>" data-toggle="collapse" data-target="#submenu-1">
        Seguros
        <i class="fas fa-angle-down"></i>
      </a>
      <ul class="submenu collapse" id="submenu-1">
        <?php $__currentLoopData = $seguros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indice => $grupoSeguro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li class="has-submenu">
            <a data-toggle="collapse" data-target="#seguros-<?php echo e($indice); ?>"
              class="<?php echo e($indice == 0 ? 'active':''); ?>">
              <?php echo e($grupoSeguro['titulo']); ?>

              <i class="fas fa-angle-down"></i>
            </a>
            <ul class="submenu collapse" id="seguros-<?php echo e($indice); ?>">
              <?php $__currentLoopData = $grupoSeguro['seguros']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seguro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a
                    href="<?php echo e(asset('seguros/'. $seguro['slug'])); ?>"><?php echo e($seguro['nombre']); ?></a>
                </li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
          </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
    </li>
    <li>
      <a class="<?php echo e(Request::segment(1) === 'servicios_en_linea' ? 'active' : ''); ?>" href="<?php echo e(asset('servicios_en_linea')); ?>">Servicios en linea</a>
    </li>
    <li><a class="<?php echo e(Request::segment(1) === 'nosotros' ? 'active' : ''); ?>" href="<?php echo e(asset('nosotros')); ?>">Nosotros</a></li>
    <li><a class="<?php echo e(Request::segment(1) === 'clientes' ? 'active' : ''); ?>" href="<?php echo e(asset('clientes')); ?>">Clientes</a></li>
    <li><a class="<?php echo e(Request::segment(1) === 'contacto' ? 'active' : ''); ?>" href="<?php echo e(asset('contacto')); ?>">Contacto</a></li>
    <li><a href="<?php echo e(asset('intranet')); ?>" target="_blank">Intranet corporativa</a></li>
  </ul>
</nav>