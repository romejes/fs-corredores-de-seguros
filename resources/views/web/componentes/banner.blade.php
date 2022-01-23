<div class="banner">
  <img src="{!! asset('images/banners/' . $imagenBanner )!!}" alt="">
  <div class="banner-text-container">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h1>{{ $tituloBanner }}</h1>
          @if(isset($subtituloBanner))
            <h3>{{ $subtituloBanner }}</h3>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>