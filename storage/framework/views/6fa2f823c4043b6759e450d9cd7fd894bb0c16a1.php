<?php $__env->startSection('bannerSeguro'); ?>
  <?php $__env->startComponent('web.componentes.banner', [
    "imagenBanner" => 'banner_seguro_salud.jpg', 
    "tituloBanner" => "Nuestros Seguros", 
    "subtituloBanner" => "Seguro de Salud"
  ]); ?>
  <?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('informacionSeguro'); ?>
<h2>Seguro de Salud</h2>

<article>
  <h3>¿En que consiste?</h3>
  <p>
    Es un seguro que tiene como objetivo cubrir los gastos de atención médica, ya sea de forma parcial o total.
  </p>
</article>

<article>
  <h3>Dirigido a:</h3>
  <p>Publico en general.</p>
</article>

<article>
  <h3>Cobertura del Seguro</h3>
  <ul>
    <li>Atención en ambulancia y hospitalización.</li>
    <li>Consultas médicas</li>
    <li>Exámenes preventivos</li>
    <li>Cirugías de emergencia</li>
    <li>Coberturas oncológicas</li>
    <li>Salud mental</li>
    <li>Programas de maternidad</li>
  </ul>
</article>

<article>
  <h3>Exclusiones del Seguro</h3>
  <ul>
    <li>Enfermedades detectadas durante los primeros 30 días de vigencia de la póliza.</li>
    <li>Cirugía plástica o estética.</li>
    <li>Suplementos nutricionales.</li>
  </ul>
</article>
<?php $__env->stopSection(); ?> <?php $__env->startSection('title'); ?> SOAT <?php $__env->stopSection(); ?>

<?php echo $__env->make('web.plantillas.seguro', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>