<div class="card">
  @if (isset($imagen))
  <img class="card-img-top" src="{{ asset('images/' . $imagen) }}" alt="{{ $titulo }}">
  @endif
  
  <div class="card-body">
    <h4 class="card-title">{{ $titulo}}</h4>
    @if (isset($descripcion))
    <p class="card-text">{{ $descripcion }}</p>
    @endif
  </div>

  @if (isset($botones))
  <div class="card-footer">
    {{ $botones }}
  </div>      
  @endif
</div>