import axios from 'axios';
import {
  returnUrl,
  capitalizeFirstLetter,
  formatDate,
} from '../../shared/util';
import { mostrarAlerta, mostrarAlertaEnProgreso } from '../componentes/alert';
import {
  cargarListaDeDocumentosDeIdentidad,
  mostrarErroresValidacionServidor,
} from '../componentes/forms';
import { reiniciar } from '../componentes/wizard';

export function procesarFormulario() {
  const url = returnUrl('afiliaciones/seguro_estudiante');
  const formulario = document.getElementById('frm-afiliar-seguro-estudiante');
  const data = construirRequest(formulario);

  mostrarAlertaEnProgreso();

  axios
    .post(url, data)
    .then(() => {
      mostrarAlerta(
        'Datos de afiliación registrados',
        'Gracias por enviar tu solicitud de afiliación al seguro estudiantil contra accidentes. Nos comunicaremos contigo en breve',
      );
      reiniciar();
      cargarListaDeDocumentosDeIdentidad('N');
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

  data.set('estado_civil', capitalizeFirstLetter(data.get('estado_civil')));
  data.set(
    'fecha_nacimiento',
    formatDate(data.get('fecha_nacimiento'), 'DD/MM/YYYY', 'YYYY-MM-DD'),
  );
  return data;
}
