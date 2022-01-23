import 'jquery-validation';
import 'jquery-validation/dist/localization/messages_es_PE';
import 'jquery-validation/dist/additional-methods';

import { regexFecha } from "../../shared/constants";

$('#frm-afiliar-seguro-estudiante').validate({
  rules: {
    nombres: {
      required: true,
      maxlength: 40,
    },
    apellido_paterno: {
      required: true,
      maxlength: 40,
    },
    apellido_materno: {
      required: false,
      maxlength: 40,
    },
    sexo: {
      required: true,
    },
    pais: {
      required: true,
    },
    tipo_documento_identidad: {
      required: true,
    },
    numero_documento_identidad: {
      required: true,
      maxlength: 15,
      digits: true,
    },
    estado_civil: {
      required: true,
    },
    fecha_nacimiento: {
      pattern: regexFecha
    },
    correo: {
      required: true,
      email: true,
      maxlength: 40,
    },
    telefono: {
      required: true,
    },
    voucher: {
      required: true,
      extension: 'pdf|jpeg|jpg|gif|bmp|png',
    },
  },
  messages: {
    fecha_nacimiento: 'No es una fecha válida',
  },
});
