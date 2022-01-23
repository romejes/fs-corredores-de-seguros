@extends('web.plantillas.seguro') 

@section('bannerSeguro')
  @component('web.componentes.banner', [
    "imagenBanner" => 'banner_seguro_vida.jpg', 
    "tituloBanner" => "Nuestros Seguros", 
    "subtituloBanner" => "Seguro de Vida"
  ])
  @endcomponent
@endsection

@section('informacionSeguro')
<h2>Seguro de Vida</h2>

<article>
  <h3>¿En que consiste?</h3>
  <p>
    Es un seguro que tiene como objetivo brindar una cantidad monetaria a la
    familia del asegurado o a quien o quienes el asegurado determine como beneficiarios
    una vez que este fallezca o quede en estado de invalidez.
  </p>
</article>

<article>
  <h3>Dirigido a:</h3>
  <p>Publico en general entre los 18 hasta los 60 años.</p>
</article>

<article>
  <h3>Cobertura del Seguro</h3>
  <ul>
    <li>Fallecimiento del asegurado.</li>
    <li>Invalidez total permanente del asegurado.</li>
  </ul>
</article>

<article>
  <h3>Exclusiones del Seguro</h3>
  <p>Todos aquellos siniestros producidos como consecuencia de:</p>
  <ul>
    <li>Suicidio.</li>
    <li>Servicio militar o policial.</li>
    <li>Guerra civil o internacional</li>
    <li>Exposicion a contaminación radioactiva o accidente nuclear.</li>
    <li>Competencias de velocidad mediante el uso de vehiculos de cualquier indole (incluye tambien las sesiones de entrenamiento).</li>
  </ul>
</article>
@endsection @section('title') SOAT @endsection
