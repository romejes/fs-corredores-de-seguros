<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="" class="brand-link">
    <span class="brand-text font-weight-light">FSCA</span>
  </a>

  <div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="<?php echo e(url('intranet')); ?>" class="nav-link <?php echo e(Request::segment(2) == '' ? 'active': ''); ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Panel de Control</p>
          </a>
        </li>
        <li class="nav-item has-treeview <?php echo e(Request::segment(2) == 'cotizaciones' ? 'menu-open' : ''); ?>">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-comment-dollar"></i>
            <p>
              Cotizaciones
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo e(URL::to('intranet/cotizaciones/soat')); ?>"
                class="nav-link <?php echo e(Request::segment(3) == 'soat' && Request::segment(2) == 'cotizaciones' ? 'active': ''); ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>SOAT</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo e(URL::to('intranet/cotizaciones/vehiculo_todo_riesgo')); ?>"
                class="nav-link <?php echo e(Request::segment(3) == 'vehiculo_todo_riesgo' && Request::segment(2) == 'cotizaciones' ? 'active': ''); ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Seguro Vehícular Todo Riesgo</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has treeview <?php echo e(Request::segment(2) == 'afiliaciones' ? 'menu-open' : ''); ?>">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Afiliaciones
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo e(URL::to('intranet/afiliaciones/seguro_estudiante')); ?>"
                class="nav-link <?php echo e(Request::segment(3) == 'seguro_estudiante' ? 'active': ''); ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Seguro Estudiantil</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</aside>