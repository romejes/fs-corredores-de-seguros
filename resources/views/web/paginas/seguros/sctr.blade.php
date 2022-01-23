@extends('web.plantillas.seguro')

@section('bannerSeguro')
  @component('web.componentes.banner', [
    "imagenBanner" => 'banner_sctr.jpg', 
    "tituloBanner" => "Nuestros Seguros", 
    "subtituloBanner" => "SCTR"
  ])
  @endcomponent
@endsection

@section('informacionSeguro')
<h2>SCTR</h2>

<article>
  <h3>¿En que consiste?</h3>
  <p>
    El Seguro Complementario de Trabajo de Riesgo (SCTR) es un seguro destinado
    a prestar servicios de salud y económicos a trabajadores que ejerzan labores
    consideradas de alto riesgo.
  </p>
  <p>El seguro SCTR se divide en dos tipos: SCTR Pensión y SCTR Salud.</p>
</article>

<article>
  <h3>Dirigido a:</h3>
  <p>
    Trabajadores de empresas que desempeñen las siguientes actividades
    económicas:
  </p>
  <ul>
    <li>Extracción de madera.</li>
    <li>Pesca.</li>
    <li>Petróleo crudo y gas natural.</li>
    <li>Extracción de minerales.</li>
    <li>Industria del tabaco.</li>
    <li>Fabricación de textiles.</li>
    <li>Cuero y sucedáneos.</li>
    <li>Industria de madera y corcho.</li>
    <li>Fabricación sustancias químicas industriales.</li>
    <li>Fabricación de otros productos químicos.</li>
    <li>Refinerías de petróleo.</li>
    <li>Derivados del petróleo y carbón.</li>
    <li>Servicio médico odontológico.</li>
    <li>Fabricación de productos plásticos.</li>
    <li>Fabricación de productos de vidrio.</li>
    <li>Fabricación de otros productos minerales no metálicos.</li>
    <li>Industria básica del hierro y acero.</li>
    <li>Industria básica de metales no ferrosos.</li>
    <li>Fabricación de productos metálicos.</li>
    <li>Construcción de maquinarias.</li>
    <li>Electricidad, gas y vapor.</li>
    <li>Construcción.</li>
    <li>Transporte aéreo.</li>
    <li>Servicios de saneamiento.</li>
  </ul>
</article>

<article>
  <h3>Cobertura del Seguro</h3>
  <ul>
    <li>Pensión por invalidez permanente o temporal</li>
    <li>Gastos de sepelio</li>
    <li>Atención médica, farmacológica, hospitalaria y quirúrgica.</li>
    <li>Rehabilitación y readaptación laboral.</li>
    <li>Gastos en medicamentos y aparatos ortopédicos o prótesis de ser necesario.</li>
  </ul>
</article>

<article>
  <h3>Exclusiones del Seguro</h3>
  <ul>
    <li>Lesiones involuntarias y auto infligidas.</li>
    <li>Accidentes calificados como accidentes no laborales o que hayan ocurrido fuera del horario y lugar de trabajo.</li>
    <li>Enfermedades no profesionales.</li>
    <li>Invalidez formada antes de la entrada en vigencia del seguro.</li>
    <li>Si recibe subsidio de EsSalud.</li>
  </ul>
</article>
@endsection @section('title') SOAT @endsection
