import axios from 'axios';
import { returnUrl } from '../../shared/util';
import { mostrarAlerta, mostrarAlertaEnProgreso } from '../componentes/alert';

export function procesarFormulario() {
  const url = returnUrl('contacto');
  const formulario = document.getElementById('frm-contact');
  const data = new FormData(formulario);

  mostrarAlertaEnProgreso();

  axios
    .post(url, data)
    .then(() => {
      mostrarAlerta(
        'Mensaje enviado',
        'Tu mensaje está en camino. Gracias por comunicarte con nosotros',
      );
      formulario.reset();
    })
    .catch(() => {
      mostrarAlerta(
        'Algo ocurrió',
        'Tu mensaje no se pudo enviar. Por favor inténtalo mas tarde',
        'error',
      );
    });
}
