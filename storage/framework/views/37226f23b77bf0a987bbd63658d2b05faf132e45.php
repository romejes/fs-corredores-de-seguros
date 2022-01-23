<?php $__env->startSection('bannerSeguro'); ?>
  <?php $__env->startComponent('web.componentes.banner', [
    "imagenBanner" => 'banner_seguro_covid19.jpg', 
    "tituloBanner" => "Nuestros Seguros", 
    "subtituloBanner" => "Seguro contra la COVID-19"
  ]); ?>
  <?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('informacionSeguro'); ?>
<h2>Seguro contra COVID-19</h2>

<article>
  <h3>¿En que consiste?</h3>
  <p>
    Es un seguro que te protege del COVID-19, otorgándote una renta económica
    por cada día de hospitalización.
  </p>
</article>

<article>
  <h3>Dirigido a:</h3>
  <p>
    Empresas con mas de 20 trabajadores que buscan proteger a sus trabajadore en
    planilla del COVID-19, que tengan entre 18 a 70 años de edad.
  </p>
</article>

<article>
  <h3>Cobertura del Seguro</h3>
  <ul>
    <li>Renta hospitalaria diaria por COVID-19</li>
    <li>Indemnización por concepto de recuperación de la enfermedad, siempre y cuando haya ingresado a UCI.</li>
    <li>Indemnización por fallecimiento.</li>
    <li>Orientación médica telefónica las 24 horas</li>
  </ul>
</article>

<article>
  <h3>Exclusiones del Seguro</h3>
  <ul>
    <li>Condiciones preexistentes y sus secuelas</li>
    <li>Solo cubre el primer diagnóstico de la enfermedad.</li>
    <li>No aplica para atenciones médicas que requieran tratamiento hospitalario por consecuencias o secuelas de una infeccion por COVID-19 previa.</li>
  </ul>
</article>
<?php $__env->stopSection(); ?> <?php $__env->startSection('title'); ?> SOAT <?php $__env->stopSection(); ?>

<?php echo $__env->make('web.plantillas.seguro', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>