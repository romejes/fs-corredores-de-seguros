import 'jquery-validation';
import { tipoClienteConstants } from '../../shared/constants';

export function cambiarReglasTipoCliente(tipoCliente) {
  if (tipoCliente === tipoClienteConstants.PERSONA_NATURAL) {
    $('#txt-nombres').rules('add', {
      required: true,
    });
    $('#txt-apellido-paterno').rules('add', {
      required: true,
    });
    $('#txt-razon-social').rules('remove');
  }

  if (tipoCliente === tipoClienteConstants.PERSONA_JURIDICA) {
    $('#txt-nombres').rules('remove');
    $('#txt-apellido-paterno').rules('remove');
    $('#txt-razon-social').rules('add', {
      required: true,
    });
  }
}
