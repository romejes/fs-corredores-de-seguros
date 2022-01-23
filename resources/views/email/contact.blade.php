<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
</head>

<body>
    <p>Mensaje enviado a través del formulario de contacto del sitio web de FS Corredores de Seguros</p>

    <br>
    <span><strong>De: </strong>{!! $contactData->getRemitente()!!}</span><br>
    <span><strong>Telefono: </strong> {!! $contactData->getTelefono() !!}</span><br>
    <span><strong>Email: </strong> {!! $contactData->getCorreo() !!}</span><br>

    <p>{{ $contactData->getMensaje() }}</p>
</body>

</html>