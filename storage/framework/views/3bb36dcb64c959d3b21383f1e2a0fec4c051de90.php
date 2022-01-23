<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
</head>

<body>
    <p>Solicitud de Compra de SOAT</p>
    <br>
    <span><strong>Código de Solicitud: </strong><?php echo $detalle->solicitud->Codigo; ?></span><br>
    <span><strong>Tipo de compra: </strong><?php echo $detalle->TipoCompra; ?></span><br>
    <span><strong>Cliente: </strong><?php echo $detalle->solicitado_por; ?></span><br>
    <span><strong>Telefono: </strong> <?php echo $detalle->Telefono; ?></span><br>
    <span><strong>Email: </strong> <?php echo $detalle->Email; ?></span><br>

</body>

</html>