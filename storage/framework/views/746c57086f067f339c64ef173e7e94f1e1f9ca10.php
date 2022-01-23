<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
</head>

<body>
    <p>Mensaje enviado a través del formulario de contacto del sitio web de FS Corredores de Seguros</p>

    <br>
    <span><strong>De: </strong><?php echo $contactData->getRemitente(); ?></span><br>
    <span><strong>Telefono: </strong> <?php echo $contactData->getTelefono(); ?></span><br>
    <span><strong>Email: </strong> <?php echo $contactData->getCorreo(); ?></span><br>

    <p><?php echo e($contactData->getMensaje()); ?></p>
</body>

</html>