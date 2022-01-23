@extends('web.plantillas.seguro')

@section('bannerSeguro')
  @component('web.componentes.banner', [
    "imagenBanner" => 'banner_soat.jpg', 
    "tituloBanner" => "Nuestros Seguros", 
    "subtituloBanner" => "SOAT"
  ])
  @endcomponent
@endsection

@section('informacionSeguro')
<h2>SOAT</h2>

<article>
  <h3>¿En que consiste?</h3>
  <p>
    El SOAT (Seguro Obligatorio de Accidentes de Tránsito) brinda una cobertura
    a todos aquellas personas que ocupan un vehiculo y a los peatones en caso de
    ocurrir un accidente de tránsito. Es de caracter obligatorio establecido por
    ley.
  </p>
</article>

<article>
  <h3>Dirigido a:</h3>
  <p>Publico en general, que posea algún vehiculo motorizado.</p>
</article>

<article>
  <h3>Cobertura del Seguro</h3>
  <p>
    Los montos de cobertura dependen de la situación de la persona accidentada
    tal como se puede ver en la siguiente tabla:
  </p>

  <table class="table">
    <thead>
      <th>Descripción</th>
      <th>Cobertura por persona</th>
    </thead>
    <tbody>
      <tr>
        <td>Muerte</td>
        <td>4 UIT</td>
      </tr>
      <tr>
        <td>Invalidez permanente</td>
        <td>Hasta 4 UIT</td>
      </tr>
      <tr>
        <td>Incapacidad temporal</td>
        <td>Hasta 1 UIT</td>
      </tr>
      <tr>
        <td>Gastos médicos</td>
        <td>Hasta 5 UIT</td>
      </tr>
      <tr>
        <td>Gastos de sepelio</td>
        <td>Hasta 1 UIT</td>
      </tr>
    </tbody>
  </table>
</article>

<article>
  <h3>Exclusiones del Seguro</h3>
  <p>
    Todas las muertes o lesiones corporales producto de las siguientes
    situaciones:
  </p>
  <ul>
    <li>
      Causadas en carreras de automóviles y otras competencias de vehículos
      automotores.
    </li>
    <li>Ocurridas fuera del territorio nacional.</li>
    <li>
      Ocurridas como consecuencia de guerras, eventos de la naturaleza u otros
      casos fortuitos o de fuerza mayor enteramente extraños a la circulación
      del vehículo automotor.
    </li>
    <li>
      Suicido o lesiones producidas a propósito usando el vehículo asegurado.
    </li>
    <li>Lugares no abiertos para el tránsito público.</li>
  </ul>
</article>
@endsection

@section('title')SOAT @endsection