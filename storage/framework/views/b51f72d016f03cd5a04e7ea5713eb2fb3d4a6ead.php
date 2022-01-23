<?php $__env->startSection('bannerSeguro'); ?>
  <?php $__env->startComponent('web.componentes.banner', [
    "imagenBanner" => 'banner_seguro_deshonestidad.jpg', 
    "tituloBanner" => "Nuestros Seguros", 
    "subtituloBanner" => "Seguro por Deshonestidad"
  ]); ?>
  <?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('informacionSeguro'); ?>
<h2>Seguro por Deshonestidad</h2>

<article>
  <h3>¿En que consiste?</h3>
  <p>
    Es un seguro destinado a cubrir las perdidas causadas por actos de
    deshonestidad de parte de los trabajadores de la empresa asegurada.
  </p>
</article>

<article>
  <h3>Dirigido a:</h3>
  <p>Empresas en general que requieran asegurar su patrimonio.</p>
</article>

<article>
  <h3>Cobertura del Seguro</h3>
  <p>La poliza se encarga de cubrir la perdida de objetos o dinero causadas por robo, fraude o cualquier acto de deshonestidad.</p>
</article>

<article>
  <h3>Exclusiones del Seguro</h3>
  <p>
    La póliza no cubre la perdida de objetos patrimoniales asegurados como consecuencia de:
  </p>
  <ul>
    <li>Negligencia, error, o acto involuntario del trabajador.</li>
    <li>Orden, mandato o autorización de parte del asegurado o cualquier superior del trabajador.</li>
    <li>Errores de inventario.</li>
    <li>Actos cometidos por un trabajador con antecedentes penales, y que ya cometió con anterioridad un acto de deshonestidad contra el asegurado.</li>
    <li>Actos cometidos por el propio asegurado o dueño, socio y/o accionista del negocio.</li>
  </ul>
</article>
<?php $__env->stopSection(); ?> <?php $__env->startSection('title'); ?> SOAT <?php $__env->stopSection(); ?>

<?php echo $__env->make('web.plantillas.seguro', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>