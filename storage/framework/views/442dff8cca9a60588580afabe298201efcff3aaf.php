<?php $__env->startSection('bannerSeguro'); ?>
  <?php $__env->startComponent('web.componentes.banner', [
    "imagenBanner" => 'banner_seguro_hogar.jpg', 
    "tituloBanner" => "Nuestros Seguros", 
    "subtituloBanner" => "Seguro para el Hogar"
  ]); ?>
  <?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('informacionSeguro'); ?>
<h2>Seguro para el Hogar</h2>

<article>
  <h3>¿En que consiste?</h3>
  <p>
    Es un seguro destinado a respaldar la casa del asegurado frente a cualquier incidente que pueda ocurrir.
  </p>
</article>

<article>
  <h3>Dirigido a:</h3>
  <p>Publico en general que deseen contar con una proteccion de su casa o departamento.</p>
</article>

<article>
  <h3>Cobertura del Seguro</h3>
  <ul>
    <li>Daños materiales ocasionados por incendios.</li>
    <li>Daños producidos como consecuencia de un terremoto y/o tsunami.</li>
    <li>Robo de objetos de uso doméstico y/o de valor.</li>
    <li>Daños producidos por el choque de un vehículo.</li>
    <li>Daños internos de equipos electrónicos.</li>
    <li>Inundaciones.</li>
    <li>Responsabilidad Civil.</li>
  </ul>
</article>

<article>
  <h3>Exclusiones del Seguro</h3>
  <p>La póliza no cubre todos los incidentes que resulten como consecuencia directa o indirecta de:</p>
  <ul>
    <li>Corte de servicios públicos.</li>
    <li>Labores de servicio, comerciales o industriales</li>
    <li>Lucro cesante.</li>
    <li>Guerra internacional o civil.</li>
    <li>Vibraciones del suelo y del subsuelo cuya naturaleza no se deba a un movimiento sísmico.</li>
    <li>Virus informáticos.</li>
  </ul>
</article>
<?php $__env->stopSection(); ?> <?php $__env->startSection('title'); ?> SOAT <?php $__env->stopSection(); ?>

<?php echo $__env->make('web.plantillas.seguro', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>