@extends('web.plantillas.seguro')

@section('bannerSeguro')
  @component('web.componentes.banner', [
    "imagenBanner" => 'banner_seguro_viaje.jpg', 
    "tituloBanner" => "Nuestros Seguros", 
    "subtituloBanner" => "Seguro de Viaje"
  ])
  @endcomponent
@endsection

@section('informacionSeguro')
<h2>Seguro de Viaje</h2>

<article>
  <h3>¿En que consiste?</h3>
  <p>
    Es un seguro que asiste al beneficiario ante cualquier imprevisto (como por ejemplo la pérdida de su equipaje) ocurrido durante un viaje nacional e internacional.
  </p>
</article>

<article>
  <h3>Dirigido a:</h3>
  <p>Personas igual o mayores de 18 años que deseen contar con un seguro antes de emprender un viaje.</p>
</article>

<article>
  <h3>Cobertura del Seguro</h3>
  <ul>
      <li>Asistencia médica por accidente y enfermedad.</li>
      <li>Muerte accidental.</li>
      <li>Invalidez parcial o total.</li>
      <li>Medicamentos para hospitalización.</li>
      <li>Compensación por perdida de equipaje.</li>
      <li>Perdida de pasaporte en el extranjero.</li>
      <li>Retrasos de viaje.</li>
  </ul>
  <p>Dependiendo del tipo de seguro que se contrate, estas pueden incluir coberturas adicionales a las ya mencionadas.</p>
</article>

<article>
  <h3>Exclusiones del Seguro</h3>
  <p>La póliza no sera aplicable si cualquier incidencia ocurre como producto de:</p>
  <ul>
    <li>Participación en actividades y/o competencias de alto riesgo.</li>
    <li>Situaciones de guerra o terrorismo.</li>
    <li>Intento de suicidio.</li>
    <li>Embarazo.</li>
    <li>Confiscación de equipaje por parte de la autoridad de aduanas competente u otra autoridad gubernamental.</li>
    <li>Participación del asegurado en actividades políticas, huelgas o actos de terrorismo.</li>
    <li>Enfermedades congenitas o preexistentes que hayan sido diagnosticadas anteriormente.</li>
  </ul>
</article>
@endsection @section('title') SOAT @endsection
