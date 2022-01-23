 <?php $__env->startSection('content'); ?>
<main>
  <!-- Carousel -->
  <div class="carousel owl-carousel">
    <div class="carousel-slide" data-img="<?php echo e(asset('images/carousel/banner_soat_small.jpg')); ?>"
      data-md-img="<?php echo e(asset('images/carousel/banner_soat_large.jpg')); ?>">
      <div class="carousel-slide-text">
        <h2 class="carousel-text-animated">Tu SOAT en un instante</h2>
        <p class="carousel-text-animated">Cotizalo y adquierelo en menos de un minuto</p>
        <a class="carousel-text-animated button button-alt" href="<?php echo e(asset('solicitudes/comprar_soat')); ?>">Comprar</a>
        <a class="carousel-text-animated button button-alt" href="<?php echo e(asset('solicitudes/cotizar_soat')); ?>">Cotizar</a>
      </div>
    </div>
    <div class="carousel-slide" data-img="<?php echo e(asset('images/carousel/banner_seguro_vehiculo_small.jpg')); ?>"
      data-md-img="<?php echo e(asset('images/carousel/banner_seguro_vehiculo_large.jpg')); ?>">
      <div class="carousel-slide-text">
        <h2 class="carousel-text-animated">No permitas que le pase esto a tu auto</h2>
        <p class="carousel-text-animated">Protégelo con nosotros</p>
        <a class="carousel-text-animated button button-alt"
          href="<?php echo e(asset('solicitudes/cotizar_seguro_vehicular_todo_riesgo')); ?>">Cotizar
          Seguro Vehicular</a>
      </div>
    </div>
    <div class="carousel-slide" data-img="<?php echo e(asset('images/carousel/banner_seguro_estudiante_small.jpg')); ?>"
      data-md-img="<?php echo e(asset('images/carousel/banner_seguro_estudiante_large.jpg')); ?>">
      <div class="carousel-slide-text">
        <h2 class="carousel-text-animated">Estudia protegido</h2>
        <p class="carousel-text-animated">Si eres estudiante de la UNJBG, asegúrate y estudia con total tranquilidad</p>
        <a class="carousel-text-animated button button-alt"
          href="<?php echo e(asset('solicitudes/afiliar_seguro_estudiantil')); ?>">Afiliar</a>
      </div>
    </div>
  </div>
  <!-- End Carousel -->

  <!-- Section: Nuestros Seguros -->
  <section>
    <div class="section-container">
      <div class="section-row">
        <div class="section-heading col-12">
          <h2 class="section-title">Nuestros Seguros</h2>
        </div>
        <div class="section-body col-12">
          <div class="wrapper-card">
            <div class="card" data-aos="fade-up">
              <img src="<?php echo e(asset('images/seguros/seguro_soat.jpg')); ?>" alt="">
              <div class="card-body">
                <h3 class="card-title">SOAT</h3>
                <p class="card-text">El SOAT (Seguro Obligatorio de Accidentes de Tránsito) cubre no solo al conductor
                  del
                  vehículo, sino también a ocupantes o terceros no ocupantes de un vehículo automotor, este vela por tu
                  bienestar y beneficia a la sociedad de manera inmediata e incondicional. </p>
              </div>
              <div class="card-footer">
                <a href="<?php echo e(url('seguros/soat')); ?>" class="button button-primary">Ver más</a>
              </div>
            </div>

            <div class="card" data-aos="fade-up">
              <img src="<?php echo e(asset('images/seguros/seguro_vehiculo.jpg')); ?>" alt="">
              <div class="card-body">
                <h3 class="card-title">Seguro Vehicular</h3>
                <p class="card-text">En estos tiempos contar con un seguro vehicular nos da la tranquilidad ya que
                  cuando
                  sufrimos un accidente como un choque o robo, donde podremos ser respaldados e indemnizados por la
                  compañía de seguros y dejar a nuestro auto en las mismas condiciones como estaba antes del accidente.
                </p>
              </div>
              <div class="card-footer">
                <a href="<?php echo e(url('seguros/seguro_vehicular_todo_riesgo')); ?>" class="button button-primary">Ver más</a>
              </div>
            </div>

            <div class="card" data-aos="fade-up">
              <img src="<?php echo e(asset('images/seguros/seguro_eps.jpg')); ?>" alt="">
              <div class="card-body">
                <h3 class="card-title">EPS</h3>
                <p class="card-text">Es un programa médico que te brinda atención ambulatoria y hospitalaria, consulta
                  médica a domicilio, atención de emergencia accidental y médica, exámenes preventivos anuales,
                  maternidad y control del niño sano entre otros. </p>
              </div>
              <div class="card-footer">
                <a href="<?php echo e(url('seguros/eps')); ?>" class="button button-primary">Ver más</a>
              </div>
            </div>
          </div>
        </div>
        <div class="section-footer col-12">
          <a href="<?php echo e(url('seguros')); ?>" class="button button-primary">Mostrar todos</a>
        </div>
      </div>
    </div>
  </section>
  <!-- End Section: Nuestros Seguros -->

  <!-- Section: Buscas SOAT -->
  <section class="section-blue" id="section-home-look-for-soat">
    <div class="section-container">
      <div class="section-row">
        <div class="section-heading col-12">
          <h2 class="section-title">¿Necesitas un SOAT?<br />Tranquilo, nosotros lo tenemos</h2>
        </div>
        <div class="section-body col-12">
          <a href="<?php echo e(url('solicitudes/cotizar_soat')); ?>" class="button button-alt" id="btn-quote-soat"
            data-aos="fade-right" id="btn-soat-cotizar">Cotiza aquí</a>
          <a href="<?php echo e(url('solicitudes/comprar_soat')); ?>" class="button button-alt" id="btn-buy-soat"
            data-aos="fade-left" id="btn-soat-comprar">Compra aquí</a>
        </div>
      </div>
    </div>
  </section>
  <!-- End Section: Buscas SOAT -->

  <!-- Section: Compañias de Seguros -->
  <section class="section-grey" id="section-home-insurance-companies">
    <div class="section-container">
      <div class="section-row">
        <div class="section-heading col-12 col-lg-5">
          <h2 class="section-title">Trabajamos con las principales compañías de seguros en el país</h2>
        </div>
        <div class="section-body col-12 col-lg-7">
          <div class="insurance-companies-wrapper">
            <img data-aos="fade-up" src="<?php echo e(asset('images/aseguradoras/mapfre.svg')); ?>" alt="MAPFRE" />
            <img data-aos="fade-up" src="<?php echo e(asset('images/aseguradoras/lapositivaseguros.svg')); ?>" alt="La Positiva" />
            <img data-aos="fade-up" src="<?php echo e(asset('images/aseguradoras/pacifico.svg')); ?>" alt="Pacífico" />
            <img data-aos="fade-up" src="<?php echo e(asset('images/aseguradoras/rimac.svg')); ?>" alt="Rimac" />
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Section: Compañias de Seguros -->
</main>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('title'); ?>
Pagina de Inicio
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>