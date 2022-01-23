<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
    <tr style="background:#000;color:#fff;font-weight:thin">
        <td valign="middle">Apellido Paterno</td>
        <td valign="middle">Apellido Materno</td>
        <td valign="middle">Nombres</td>
        <td valign="middle" style="text-align:center">Sexo</td>
        <td valign="middle" style="text-align:center">Estado Civil</td>
        <td valign="middle" style="text-align:center">Fecha de Nacimiento</td>
        <td valign="middle" style="text-align:center">N° Documento</td>
        <td valign="middle" style="text-align:center">E-mail</td>
        <td valign="middle" style="text-align:center">Teléfono</td>
    </tr>
    @foreach ($data as $fila)
    <tr>
        <td style="padding:10px" valign="middle">{{ strtoupper($fila->ApellidoPaterno) }}</td>
        <td style="padding:10px" valign="middle">{{ strtoupper($fila->ApellidoMaterno)}}</td>
        <td style="padding:10px" valign="middle">{{ strtoupper($fila->Nombres)}}</td>
        <td style="padding:10px;text-align:center" valign="middle">{{ $fila->Sexo}}</td>
        <td style="padding:10px;text-align:center" valign="middle">
            @if ($fila->EstadoCivil === 'Casado')
                1
            @elseif($fila->EstadoCivil === 'Soltero')
                2
            @elseif($fila->EstadoCivil === 'Viudo')
                3
            @elseif($fila->EstadoCivil === 'Divorciado')
                4
            @endif
        </td>
        <td style="padding:10px;text-align:center" valign="middle">{{ date_format(date_create($fila->FechaNacimiento), 'd/m/Y') }}</td>
        <td style="padding:10px;text-align:center" valign="middle">{{ $fila->NumeroDocumentoIdentidad }}</td>
        <td style="padding:10px;text-align:center" valign="middle">{{ $fila->Email}}</td>
        <td style="padding:10px;text-align:center" valign="middle">{{ $fila->Telefono}}</td>
    </tr>
    @endforeach
</body>

</html>