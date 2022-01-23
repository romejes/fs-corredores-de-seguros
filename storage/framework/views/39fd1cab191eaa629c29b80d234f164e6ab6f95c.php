<?php $__env->startSection('bannerSeguro'); ?>
  <?php $__env->startComponent('web.componentes.banner', [
    "imagenBanner" => 'banner_seguro_transporte.jpg', 
    "tituloBanner" => "Nuestros Seguros", 
    "subtituloBanner" => "Seguro de Transporte de Mercadería"
  ]); ?>
  <?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('informacionSeguro'); ?>
<h2>Seguro de Transporte de Mercadería</h2>

<article>
  <h3>¿En que consiste?</h3>
  <p>
    Es un seguro que se encarga de cubrir todos los riesgos que puedan afectar
    la mercadería que es transportada por vía terrestre, marítima o aérea.
  </p>
</article>

<article>
  <h3>Dirigido a:</h3>
  <p>
    Personas naturales, empresas comerciales, industriales, de servicios y en
    general todo tipo de empresas que requieran asegurar el traslado de su
    mercadería durante el curso ordinario de importación y/o exportación.
  </p>
</article>

<article>
  <h3>Cobertura del Seguro</h3>
  <ul>
    <li>Robo y asalto para embarcaciones.</li>
    <li>Daños directos que hayan sufrido los bienes y la mercadería.</li>
    <li>Accidentes del medio de transporte utilizado.</li>
    <li>Caídas durante las operaciones de carga y descarga.</li>
  </ul>
</article>

<article>
  <h3>Exclusiones del Seguro</h3>
  <p>
    Se excluye la cobertura por daños y perdidas provocados como consecuencia
    directa o indirecta de:
  </p>
  <ul>
    <li>Consecuencias de una guerra ya sea declarada oficialmente o no.</li>
    <li>Terrorismo, guerra civil y las acciones que se originen a causa de estos.</li>
    <li>Insuficiencia de embalaje.</li>
    <li>Culpa o hecho ílicito doloso de parte del asegurado o de sus encargados o agentes de aduana.</li>
    <li>Explosión de minas, torpedos, bombas u armas de guerra abandonadas.</li>
    <li>Huelgas</li>
    <li>Otras exclusiones que se indiquen en los seguros de transporte contratados.</li>
  </ul>
</article>
<?php $__env->stopSection(); ?> <?php $__env->startSection('title'); ?> SOAT <?php $__env->stopSection(); ?>

<?php echo $__env->make('web.plantillas.seguro', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>