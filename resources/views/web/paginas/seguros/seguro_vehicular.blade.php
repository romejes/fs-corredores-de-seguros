@extends('web.plantillas.seguro') 

@section('bannerSeguro')
  @component('web.componentes.banner', [
    "imagenBanner" => 'banner_seguro_vehiculo.jpg', 
    "tituloBanner" => "Nuestros Seguros", 
    "subtituloBanner" => "Seguro Vehicular"
  ])
  @endcomponent
@endsection

@section('informacionSeguro')
<h2>Seguro Vehicular</h2>

<article>
  <h3>¿En que consiste?</h3>
  <p>
    Es un seguro destino a la protección de su vehículo ante cualquier siniestro
    o daño que se produzca, asi com tambien a los pasajeros que ocupen el
    vehiculo asegurado.
  </p>
</article>

<article>
  <h3>Dirigido a:</h3>
  <p>Publico en general, que posea algún vehiculo motorizado</p>
</article>

<article>
  <h3>Cobertura del Seguro</h3>
  <ul>
    <li>Daños parciales o totales del vehículo asegurado.</li>
    <li>Daños a terceros (personas que se encontraban fuera del vehiculo).</li>
    <li>Accidentes de los ocupantes.</li>
    <li>Indemnización por robo del vehículo.</li>
  </ul>
</article>

<article>
  <h3>Exclusiones del Seguro</h3>
  <p>El seguro no cubre daños y/o perdidas que pueda sufrir el vehiculo si:</p>
  <ul>
    <li>Ocurrió fuera del territorio nacional.</li>
    <li>El conductor estuvo manejando bajo los efectos del alcohol y/o drogas.</li>
    <li>El conductor no posee una licencia de conducir oficial y vigente.</li>
    <li>Es usado para fines deportivos o sesiones de practica de manejo</li>
  </ul>
</article>
@endsection @section('title') SOAT @endsection
