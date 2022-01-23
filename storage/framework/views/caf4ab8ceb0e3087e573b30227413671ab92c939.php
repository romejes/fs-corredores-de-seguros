<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
</head>

<body>
    <p>Solicitud de Cotización de Seguro Vehicular</p>
    <br>
    <span><strong>Código de Solicitud: </strong><?php echo $detalle->solicitud->Codigo; ?></span><br>
    <span><strong>Nombres y apellidos del solicitante: </strong><?php echo trim($detalle->solicitado_por); ?></span><br>
    <span><strong>Fecha y Hora de envio: </strong> <?php echo $detalle->solicitud->FechaHoraRegistro; ?></span><br>
</body>

</html>