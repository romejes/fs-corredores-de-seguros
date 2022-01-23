<ul class="navbar-links-container">
  <li class="navbar-link has-children <?php echo e(Request::segment(1) == 'seguros' ? 'active':''); ?>">
    <a title="Seguros">
      <span>Seguros</span>
      <i class="fas fa-angle-down"></i>
    </a>
    <div class="navbar-submenu">
      <div class="submenu-group">
        <ul>
          <li class="submenu-group-title">Personas</li>
          <li>
            <a href="<?php echo e(url('seguros/seguro_persona_robo')); ?>">Seguro contra robo domiciliario</a>
          </li>
        </ul>
      </div>

      <div class="submenu-group">
        <ul>
          <li class="submenu-group-title">Empresas</li>
          <li>
            <a href="<?php echo e(url('seguros/seguro_empresa_robo')); ?>">Seguro contra robos y asaltos</a>
          </li>
          <li>
            <a href="<?php echo e(url('seguros/seguro_responsabilidad_civil')); ?>">Seguro por responsabilidad civil</a>
          </li>
          <li>
            <a href="<?php echo e(url('seguros/seguro_riesgo_montaje')); ?>">Seguro contra riesgo de montaje</a>
          </li>
          <li>
            <a href="<?php echo e(url('seguros/seguro_incendio')); ?>">Seguro contra incendios
            </a>
          </li>
          <li>
            <a href="<?php echo e(url('seguros/eps')); ?>">EPS</a>
          </li>
        </ul>
      </div>

      <div class="submenu-group">
        <ul>
          <li class="submenu-group-title">Vehiculares</li>
          <li>
            <a href="<?php echo e(url('seguros/soat')); ?>">SOAT</a>
          </li>
          <li>
            <a href="<?php echo e(url('seguros/seguro_vehicular_todo_riesgo')); ?>">Seguro Vehicular</a>
          </li>
        </ul>
      </div>

      <div class="submenu-group">
        <ul>
          <li class="submenu-group-title">Otros</li>
          <li>
            <a href="<?php echo e(url('seguros/seguro_terremotos')); ?>">Seguro contra terremotos</a>
          </li>
        </ul>
      </div>
    </div>
  </li>

  <li class="navbar-link has-children <?php echo e(Request::segment(1) == 'solicitudes' ? 'active':''); ?>">
    <a title="Solicitudes">Solicitudes <i class="fas fa-angle-down"></i></a>
    <div class="navbar-submenu">
      <div class="submenu-group">
        <ul>
          <li class="submenu-group-title">SOAT</li>
          <li><a href="<?php echo e(url('solicitudes/comprar_soat')); ?>">Comprar</a></li>
          <li><a href="<?php echo e(url('solicitudes/cotizar_soat')); ?>">Cotizar</a></li>
        </ul>
      </div>
      <div class="submenu-group">
        <ul>
          <li class="submenu-group-title">Seguro Vehicular</li>
          <li>
            <a href="<?php echo e(url('solicitudes/cotizar_seguro_vehicular_todo_riesgo')); ?>">Cotizar</a>
          </li>
        </ul>
      </div>
      <div class="submenu-group">
        <ul>
          <li class="submenu-group-title">
            Seguro Estudiantil contra Accidentes
          </li>
          <li>
            <a href="<?php echo e(url('solicitudes/afiliar_seguro_estudiantil')); ?>">Afiliar</a>
          </li>
        </ul>
      </div>
    </div>
  </li>
  <li class="navbar-link <?php echo e(Request::segment(1) == 'nosotros' ? 'active':''); ?>">
    <a href="<?php echo e(url('nosotros')); ?>" title="Nosotros">Nosotros</a>
  </li>
  <li class="navbar-link <?php echo e(Request::segment(1) == 'clientes' ? 'active':''); ?>">
    <a href="<?php echo e(url('clientes')); ?>" title="Clientes">Clientes</a>
  </li>
  <li class="navbar-link <?php echo e(Request::segment(1) == 'contacto' ? 'active':''); ?>">
    <a href="<?php echo e(url('contacto')); ?>" title="Contacto">Contacto</a>
  </li>
  <li class="navbar-link">
    <a href="<?php echo e(url('intranet/login')); ?>" target="_blank" title="Intranet"><i class="fas fa-lock"></i></a>
  </li>
</ul>