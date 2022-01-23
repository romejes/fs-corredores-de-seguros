@extends('web.plantillas.seguro')

@section('bannerSeguro')
  @component('web.componentes.banner', [
    "imagenBanner" => 'banner_eps.jpg', 
    "tituloBanner" => "Nuestros Seguros", 
    "subtituloBanner" => "EPS"
  ])
  @endcomponent
@endsection

@section('informacionSeguro')
<h2>EPS</h2>
<article>
  <h3>¿En que consiste?</h3>
  <p>
    Es un seguro médico destinado a los trabajadores de una empresa. Mediante su
    afiliación estos podran ser atendidos en Entidades Prestadores de Salud (muy
    aparte de ESSALUD) y disfrutar de otros beneficios relacionados con su
    salud.
  </p>
</article>

<article>
  <h3>Dirigido a:</h3>
  <p>
    Empresas grandes, medianas o MYPES que desean segurar a sus trabajadores y
    su familia.
  </p>
</article>

<article>
  <h3>Cobertura del Seguro</h3>
  <ul>
    <li>Atencion ambulatoria y hospitlaria.</li>
    <li>Programa de maternidad.</li>
    <li>Atencion odontológica.</li>
    <li>
      Consulta, medicamentos y examenes para el tratamiento de enfermedades
      crónicas.
    </li>
  </ul>
</article>

<article>
  <h3>Exclusiones del Seguro</h3>
  <p>
    Entre las principales exclusiones tenemos:
  </p>
  <ul>
    <li>
      Tratamiento de enfermedades diagnosticadas previo a la afiliación del
      seguro.
    </li>
    <li>Cirugia estetica y ortodoncia estética.</li>
    <li>Lesiones auto infligidas.</li>
    <li>
      Lesiones sufridas en actividades peligrosas como por ejemplo: rugby,
      snowboarding, montañismo, caceríabungee, paracaidismo, puenting, downhill,
      parapente, cacería, carreras de caballo, automóviles, motocicletas y
      lanchas, entre otros.
    </li>
    <li>
      Tratamientos y/o procedimientos no autorizados por la FDA (Food and Drug
      Administration)
    </li>
  </ul>
  <p>
    Estas exclusiones se agregan a las que establezco el plan de seguro EPS que
    se elija, asi como tambien las exclusiones que puede determinar ESSALUD
  </p>
</article>
@endsection @section('title') SOAT @endsection
