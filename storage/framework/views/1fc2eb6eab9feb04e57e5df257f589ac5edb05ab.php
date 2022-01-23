<?php $__env->startSection('bannerSeguro'); ?>
  <?php $__env->startComponent('web.componentes.banner', [
    "imagenBanner" => 'banner_seguro_incendio.jpg', 
    "tituloBanner" => "Nuestros Seguros", 
    "subtituloBanner" => "Seguro contra Incendio"
  ]); ?>
  <?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('informacionSeguro'); ?>
<h2>Seguro contra Incendio</h2>

<article>
  <h3>¿En que consiste?</h3>
  <p>
    Es un seguro que cubre los daños de los bienes de la empresa a causa de un
    incendio, terremoto, maremoto, rayo, explosión, huelga, conmoción civil,
    vandalismo, terrorismo, etc.
  </p>
</article>

<article>
  <h3>Dirigido a:</h3>
  <p>Empresas en general que requieran asegurar su patrimonio.</p>
</article>

<article>
  <h3>Cobertura del Seguro</h3>
  <ul>
    <li>Daño total o parcial debido a un incendio o rayo.</li>
    <li>
      Actos de destruccion ordenados por las autoridades competentes con el
      propósito de prevenir una posible propagación del incendio.
    </li>
  </ul>
  <p>Adicionalmente es posible contratar coberturas adicionales como por ejemplo</p>
  <ul>
    <li>Daños por actos vandálicos o terroristas.</li>
    <li>
      Daños por terremotos, inundaciones, erupcion volcánica y cualquier otro
      desastre natural
    </li>
    <li>Daños por impacto y choque de vehiculos</li>
    <li>Daños por derrame de material fundido</li>
  </ul>
</article>

<article>
  <h3>Exclusiones del Seguro</h3>
  <p>
    Esta póliza se reserva el derecho de cubrir los daños y/o destrucción del
    patrimonio empresarial asegurado como consecuencia directa o indirecta de:
  </p>
  <ul>
    <li>
      Incidentes realizados de manera intencional por parte del asegurado,
      contratante o beneficiado.
    </li>
    <li>Conflictos belicos</li>
    <li>Hechos póliticos que alteren el orden público o constitucional.</li>
  </ul>
  <p>Asimismo, es posible que algunos objetos y posesiones patrimoniales no puedan ser asegurados como por ejemplo:</p>
  <ul>
    <li>Animales vivos.</li>
    <li>Terrenos.</li>
    <li>Lineas de telecomunicaciones o de corriente eléctrica.</li>
    <li>Cultivos y plantaciones</li>
    <li>Libros, registro contables, software, licencias, etc.</li>
    <li>Bienes que no esten fisicamente dentro del local asegurado.</li>
    <li>Dinero de cualquier tipo.</li>
    <li>Bienes que no sean propiedad del asegurado.</li>
  </ul>
</article>
<?php $__env->stopSection(); ?> <?php $__env->startSection('title'); ?> SOAT <?php $__env->stopSection(); ?>

<?php echo $__env->make('web.plantillas.seguro', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>