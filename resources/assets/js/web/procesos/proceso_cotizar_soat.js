import axios from 'axios';
import { formatDate, returnUrl } from '../../shared/util';
import { mostrarAlerta, mostrarAlertaEnProgreso } from '../componentes/alert';
import {
  cargarListaDeDocumentosDeIdentidad,
  mostrarErroresValidacionServidor,
  mostrarCamposTipoCliente,
} from '../componentes/forms';
import { reiniciar } from '../componentes/wizard';

export function procesarFormulario() {
  const url = returnUrl('cotizaciones/soat');
  const formulario = document.getElementById('frm-cotizar_soat');
  const data = construirRequest(formulario);

  mostrarAlertaEnProgreso();

  axios
    .post(url, data)
    .then(() => {
      mostrarAlerta(
        'Datos de cotización registrados',
        'Gracias por enviar tu solicitud de cotización de SOAT. Nos comunicaremos contigo en breve',
      );
      reiniciar();
      cargarListaDeDocumentosDeIdentidad('N');
      mostrarCamposTipoCliente('N');
    })
    .catch(error => {
      if (error.response.status === 400) {
        mostrarAlerta(
          'Algo ocurrió',
          'Algunos datos no son válidos. Por favor corrija las observaciones y vuelva a intentarlo',
          'error',
        );
        mostrarErroresValidacionServidor(error.response.data.messages);
      } else {
        mostrarAlerta(
          'Algo ocurrió',
          'Tu solicitud no se pudo enviar. Por favor inténtalo mas tarde',
          'error',
        );
      }
    });
}

function construirRequest(formulario) {
  const data = new FormData(formulario);

  if (data.get('tiene_soat') == 1) {
    const fechaVencimiento = $('#txt-fecha-vencimiento').val();
    const fechaVencimientoFormateada = formatDate(
      fechaVencimiento,
      'DD/MM/YYYY',
      'YYYY-MM-DD',
    );
    data.set('fecha_vencimiento', fechaVencimientoFormateada);
  } else {
    data.delete('fecha_vencimiento');
  }
  return data;
}
