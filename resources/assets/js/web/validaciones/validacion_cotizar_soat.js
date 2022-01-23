import 'jquery-validation';
import 'jquery-validation/dist/localization/messages_es_PE';
import 'jquery-validation/dist/additional-methods';
import { regexFecha } from '../../shared/constants';

$('#frm-cotizar_soat').validate({
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
  tipo_documento_identidad: {
    required: true,
  },
  numero_documento_identidad: {
    required: true,
    maxlength: 15,
    digits: true,
  },
  correo: {
    required: true,
    email: true,
    maxlength: 40,
  },
  telefono: {
    required: true,
  },
  anio_vehiculo: {
    required: true,
  },
  placa: {
    required: true,
    maxlength: 15,
  },
  uso: {
    required: true,
  },
  asientos: {
    required: true,
    min: 1,
  },
  compania_seguro: {
    required: true,
  },
  tiene_soat: {
    required: true,
  },
});

export function cambiarReglasFechaVencimiento($agregar = true) {
  if ($agregar) {
    $('#txt-fecha-vencimiento').rules(
      'add',
      {
        required: true,
        pattern: regexFecha,
      },
      {
        pattern: 'No es una fecha válida',
      },
    );
  } else {
    $('#txt-fecha-vencimiento').remove();
  }
}
