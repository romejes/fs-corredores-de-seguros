import 'jquery-validation';
import 'jquery-validation/dist/localization/messages_es_PE';
import 'jquery-validation/dist/additional-methods';

$('#frm-cotizar_seguro_vehicular').validate({
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
    clase_vehiculo: {
      required: true,
    },
    marca: {
      required: true,
    },
    modelo: {
      required: true,
    },
    costo: {
      required: true,
      number: true,
    },
    compania_seguro: {
      required: true,
    },
  },
});