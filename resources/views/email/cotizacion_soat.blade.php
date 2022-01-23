<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
</head>

<body>
    <p>Solicitud de Cotización de SOAT</p>
    <br>
    <span><strong>Código de Solicitud: </strong>{!! $detalle->solicitud->Codigo!!}</span><br>
    <span><strong>Nombres y apellidos del solicitante: </strong>{!! trim($detalle->solicitado_por) !!}</span><br>
    <span><strong>Fecha y Hora de envio: </strong> {!! $detalle->solicitud->FechaHoraRegistro !!}</span><br>
</body>

</html>