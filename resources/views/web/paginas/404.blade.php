@extends('web.layouts.main') @section('content')
<main>
  <!-- Heading Page -->
  @component('web.components._heading-page') 
    @slot('title')
    Pagina no encontrada  
    @endslot
  @endcomponent
  <!-- End Heading Page -->

  <!-- Section -->
  <section id="section-not-found">
    <div class="section-container">
      <div class="section-row">
        <div class="section-body col-12">
          <i class="far fa-frown fa-10x" id="icon-not-found"></i>
          <p id="message-not-found">Lo sentimos, la página que intenta visitar no existe</p>
        </div>
      </div>
    </div>
  </section>
  <!-- End Section -->
</main>
@endsection


@section('title')
Página no encontrada
@endsection