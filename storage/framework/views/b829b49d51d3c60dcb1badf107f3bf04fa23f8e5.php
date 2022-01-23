<?php $__env->startSection('bannerSeguro'); ?>
  <?php $__env->startComponent('web.componentes.banner', [
    "imagenBanner" => 'banner_seguro_robo.jpg', 
    "tituloBanner" => "Nuestros Seguros", 
    "subtituloBanner" => "Seguro por Robo y Asalto"
  ]); ?>
  <?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('informacionSeguro'); ?>
<h2>Seguro contra Robo y Asalto</h2>

<article>
  <h3>¿En que consiste?</h3>
  <p>
    Es un seguro destinado a respaldar el patrimonio de la empresa frente a
    robos, asaltos o intento de robo.
  </p>
</article>

<article>
  <h3>Dirigido a:</h3>
  <p>Empresas en general que requieran asegurar su patrimonio.</p>
</article>

<article>
  <h3>Cobertura del Seguro</h3>
  <ul>
    <li>Perforación de paredes, techos o pisos.</li>
    <li>
      Uso de cualquier herramienta cuyo uso no esta destinado originalmente para
      forzar la cerradura de una puerta.
    </li>
    <li>
      Uso de llaves del establecimiento, siempre y cuando el delincuente las
      haya obtenido de manera fraudulenta.
    </li>
    <li>Ingreso al local a través de un acceso no convencional.</li>
    <li>
      Robo o arrebato de objetos al asegurado mediante el empleo de la
      violencia.
    </li>
  </ul>
  <p>
    Todas o cualquiera de estas situaciones que se lleguen a presentar en un
    incidente de robo deben estar acreditados a traves de pruebas contundentes
    para que pueda aplicar la cobertura del seguro.
  </p>
</article>

<article>
  <h3>Exclusiones del Seguro</h3>
  <p>
    La póliza no cubre la perdida o daño en cualquiera de las siguientes
    situaciones:
  </p>
  <ul>
    <li>
      Robo en el que propio asegurado haya tenido colaboración, o algunos de sus
      representantes, dependientes, miembros de su familia o parientes bajo
      cualquier grado de consanguinidad.
    </li>
    <li>Robo en conexión con algún fenomeno meteorológico.</li>
    <li>Robo en conexión con algun embargo, confiscacion o actividad bélica.</li>
    <li>Por lucro cesante.</li>
    <li>Por robo producido debido a la negligencia comprobada del asegurado.</li>
  </ul>
</article>
<?php $__env->stopSection(); ?> <?php $__env->startSection('title'); ?> SOAT <?php $__env->stopSection(); ?>

<?php echo $__env->make('web.plantillas.seguro', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>