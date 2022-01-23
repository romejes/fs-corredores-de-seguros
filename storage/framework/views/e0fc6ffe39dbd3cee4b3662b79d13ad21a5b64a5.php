<?php $__env->startSection('bannerSeguro'); ?>
  <?php $__env->startComponent('web.componentes.banner', [
    "imagenBanner" => 'banner_seguro_responsabilidad_civil.jpg', 
    "tituloBanner" => "Nuestros Seguros", 
    "subtituloBanner" => "Seguro por Responsabilidad Civil"
  ]); ?>
  <?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('informacionSeguro'); ?>
<h2>Seguro por Responsabilidad Civil</h2>

<article>
  <h3>¿En que consiste?</h3>
  <p>
    Es un seguro destinado a cubrir los daños materiales y/o personales
    producidos de manera accidental en el cual la empresa se ve involucrada y
    declarado como responsable.
  </p>
</article>

<article>
  <h3>Dirigido a:</h3>
  <p>Empresas en general que requieran asegurar su patrimonio.</p>
</article>

<article>
  <h3>Cobertura del Seguro</h3>
  <p>
    El Seguro por Responsabilidad Civil Extracontractual tendra la siguiente
    cobertura siempre y cuando el accidente se haya producido dentro del
    territorio del Perú y mientras la póliza siga en vigencia:
  </p>
  <ul>
    <li>
      Abonar al tercero perjudicado por concepto de indemnización de daños y
      perjuicios, el cual debe pagar el asegurado por orden y sentencia de un
      tribunal civil de la República del Perú.
    </li>
    <li>
      Costos del proceso judicial realizado, incluso si el asegurado no es
      hallado como responsable de los daños que se le imputan.
    </li>
    <li>
      Prestar garantía para evitar medidas cautelares o embargos sobre el
      patrimonio de la empresa asegurada.
    </li>
  </ul>
</article>

<article>
  <h3>Exclusiones del Seguro</h3>
  <ul>
    <li>Bienes o propiedades de terceros que en el momento del accidente esten en posesión del asegurado.</li>
    <li>Daños causados por contaminación o cualquier tipo de daño ecológico.</li>
    <li>Daños ocasionados por el ejercicio de cualquier profesión, arte u oficio.</li>
    <li>Daños causados por el uso de ascensores o escaleras eléctricas.</li>
    <li>Daños por conflictos bélicos, inestabilidad política y social, terrorismo o estado de sitio.</li>
    <li>Daños ocasionados intencionalmente de parte del asegurado.</li>
    <li>Daños ocasionados por maquinarias y equipos tales como: vagones, locomotoras, transbordadores, etc.</li>
    <li>Responsabilidad penal de cualquier tipo.</li>
    <li>Multas y penalidades.</li>
  </ul>
</article>
<?php $__env->stopSection(); ?> <?php $__env->startSection('title'); ?> SOAT <?php $__env->stopSection(); ?>

<?php echo $__env->make('web.plantillas.seguro', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>