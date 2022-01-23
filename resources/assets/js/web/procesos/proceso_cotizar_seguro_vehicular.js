import axios from 'axios';
import { returnUrl } from '../../shared/util';
import { mostrarAlerta, mostrarAlertaEnProgreso } from '../componentes/alert';
import {
  cargarListaDeDocumentosDeIdentidad,
  mostrarErroresValidacionServidor,
  mostrarCamposTipoCliente
} from '../componentes/forms';
import { reiniciar } from '../componentes/wizard';

export function procesarFormulario() {
  const url = returnUrl('cotizaciones/seguro_vehicular');
  const formulario = document.getElementById('frm-cotizar_seguro_vehicular');
  const data = new FormData(formulario);

  mostrarAlertaEnProgreso();

  axios
    .post(url, data)
    .then(() => {
      mostrarAlerta(
        'Datos de cotización registrados',
        'Gracias por enviar tu solicitud de cotización de Seguro Vehicular. Nos comunicaremos contigo en breve',
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