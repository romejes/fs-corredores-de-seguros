<?php $__env->startSection('contenidoPlantillaPrincipal'); ?>

<!-- Banner -->
<?php $__env->startComponent('web.componentes.banner', ["imagenBanner" =>
  'banner_nosotros.jpg', 'tituloBanner' => "Acerca de nosotros"]); ?>
<?php echo $__env->renderComponent(); ?>
<!-- Fin Banner -->

<!-- Seccion Quienes somos -->
<section class="bgc-white">
  <div class="container">
    <div class="row">
      <article class="col-12 col-lg-6">
        <h2 class="clr-blue">¿Quienes Somos?</h2>
        <p>
          Somos una empresa especializada en la asesoría integral en Seguros,
          operando en el mercado nacional desde el año 2014, desarrollamos
          soluciones a la medida del cliente.
        </p>
        <p>
          FS Corredores de Seguros, viene alcanzando un posicionamiento de
          relevancia en el Mercado Asegurador a través de la intermediación de
          seguros a empresas públicas, privadas y personas naturales.
        </p>
      </article>
      <div class="col-12 col-lg-6">
        <img src="<?php echo e(asset('images/quienes_somos.jpg')); ?>" id="quienes_somos-picture" alt="Quienes somos">
      </div>
    </div>
  </div>
</section>
<!-- Fin Seccion Quienes somos -->

<!-- Seccion Por qué elegirnos - Que nos distingue de la competencia? -->
<section class="bgc-grey">
  <div class="container">
    <div class="row">
      <article class="col-12 col-md-6">
        <h2 class="clr-blue text-center">¿Por qué elegirnos?</h2>
        <ul class="fa-ul">
          <li><span class="fa-li clr-blue"><i class="fas fa-check"></i></span>Adecuada y oportuna Asesoría Profesional.</li>
          <li><span class="fa-li clr-blue"><i class="fas fa-check"></i></span>Le permite ahorro en la contratación de sus seguros.</li>
          <li><span class="fa-li clr-blue"><i class="fas fa-check"></i></span>
            Ante la ocurrencia de un siniestro, brindamos una asesoría
            personalizada logrando indemnizaciones justas y oportunas.
          </li>
        </ul>
      </article>
      <article class="col-12 col-md-6">
        <h2 class="clr-blue text-center">¿Qué nos distingue de la competencia?</h2>
        <ul class="fa-ul">
          <li><span class="fa-li clr-blue"><i class="fas fa-check"></i></span>Desarrollamos soluciones efectivas para nuestros clientes.</li>
          <li><span class="fa-li clr-blue"><i class="fas fa-check"></i></span>Innovación, eficiencia y rapidez en el servicio.</li>
        </ul>
      </article>
    </div>
  </div>
</section>
<!-- Fin Seccion Por qué elegirnos - Que nos distingue de la competencia? -->

<!-- Seccion Mision - Vision - Valores -->
<section class="bgc-white">
  <div class="container">
    <div class="row">
      <article class="col-12 col-md-4 text-center">
        <i class="fas fa-handshake fa-3x clr-blue mb-4"></i>
        <h2 class="clr-blue text-center">Misión</h2>
        <p class="text-center">
          Brindar un asesoramiento profesional y confiable en la gestion
          integral de seguros, a través de un eficáz servicio de atención al
          cliente
        </p>
      </article>
      <article class="col-12 col-md-4 text-center">
        <i class="fas fa-flag fa-3x clr-blue mb-4"></i>
        <h2 class="clr-blue text-center">Visión</h2>
        <p class="text-center">
          Ser la empresa de asesoría y corretaje en seguros de mayor prestigio
          y confianza en el mercado asegurador peruano, que brinde soluciones
          innovadoras, simples, transparentes y con altos estándares de
          servicio.
        </p>
      </article>
      <article class="col-12 col-md-4 text-center">
        <i class="fas fa-star fa-3x clr-blue mb-4"></i>
        <h2 class="clr-blue text-center">Valores</h2>
        <ul class="values-list">
          <?php $__currentLoopData = $valores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $valor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li><?php echo e($valor); ?></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </article>
    </div>
  </div>
</section>
<!-- Fin Seccion Mision - Vision - Valores -->

<!-- Seccion: El equipo -->
<section class="bgc-grey">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="clr-blue text-center">Nuestro equipo</h2>
      </div>
      <div class="col-12">
        <div class="cards-container staff-card-container">
          <?php $__currentLoopData = $staff; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trabajador): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card">
              <div class="card-body">
                <div class="data-staff-grid">
                  <div class="data-staff-icon-cell">
                    <i class="fas fa-user fa-2x"></i>
                  </div>
                  <div class="data-staff-info-cell">
                    <p class="mb-0"> <?php echo e($trabajador['nombre']); ?> <br>
                      <i><?php echo e($trabajador['cargo']); ?></i> 
                      <?php if(isset($trabajador['codigo_sbs'])): ?>
                      <br>
                      <i>Codigo SBS: <?php echo e($trabajador['codigo_sbs']); ?></i>
                      <?php endif; ?>
                    </p>
                  </div>
                  <div class="data-staff-icon-cell">
                    <i class="fas fa-envelope fa-2x"></i>
                  </div>
                  <div class="data-staff-info-cell">
                    <p><?php echo e($trabajador['correo']); ?></p>
                  </div>
                  <div class="data-staff-icon-cell">
                    <i class="fab fa-whatsapp fa-2x"></i>
                  </div>
                  <div class="data-staff-info-cell">
                    <p><?php echo e($trabajador['telefono']); ?></p>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Fin Seccion: El equipo -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?> Nosotros <?php $__env->stopSection(); ?>
<?php echo $__env->make('web.plantillas.principal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>