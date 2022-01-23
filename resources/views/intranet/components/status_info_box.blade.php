@if ($estadoSolicitud == 1)
<div class="info-box bg-warning">
    <span class="info-box-icon">
        <i class="fas fa-hourglass-start"></i>
    </span>
    <div class="info-box-content">
        <h4 class="info-box-text">Solicitud en espera</h4>
        <p class="info-box-text mb-0">Esta solicitud aun no ha sido atendida</p>
    </div>
</div>
@endif

@if ($estadoSolicitud == 3)
<div class="info-box bg-success">
    <span class="info-box-icon">
        <i class="fas fa-thumbs-up"></i>
    </span>
    <div class="info-box-content">
        <h4 class="info-box-text">Solicitud atendida</h4>
        <p class="info-box-text mb-0">Esta solicitud ya fue atendida</p>
    </div>
</div>
@endif

@if ($estadoSolicitud == 4)
<div class="info-box bg-danger">
    <span class="info-box-icon">
        <i class="fas fa-thumbs-down"></i>
    </span>
    <div class="info-box-content">
        <h4 class="info-box-text">Solicitud rechazada</h4>
        <p class="info-box-text mb-0">Esta solicitud fue rechazada</p>
    </div>
</div>
@endif