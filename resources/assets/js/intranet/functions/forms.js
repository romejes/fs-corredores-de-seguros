import { routes } from '../routes';
import {
  apiChangeStatusAfiliacionSeguroEstudiante,
  apiChangeStatusCompraSoat,
  apiChangeStatusCotizacionSoat,
  apiChangeStatusCotizacionVehiculoTodoRiesgo,
  apiLogin,
} from './api';
import { isValid } from './validations';

import Swal from 'sweetalert2';
import { getUriSegment } from '../../shared/util';
import { requestFormConstants } from '../../shared/constants';

/**
 * Process login form
 *
 * @author Jesus Romero
 * @date 30/09/2020
 * @export
 * @returns {Promise|boolean}
 */
export function processLoginForm() {
  const loginForm = document.getElementById('frm-login');
  if (!isValid(loginForm)) {
    return false;
  }

  const loginFormData = new FormData(loginForm);

  apiLogin(loginFormData)
    .then(() => {
      window.location.href = routes.ROUTE_DASHBOARD;
    })
    .catch(error => {
      if (error.response.status === 404) {
        Swal.fire({
          title: 'Error',
          text: error.response.data.message,
          icon: 'error',
          confirmButtonText: 'Aceptar',
        });
      }
    });
}

/**
 * Reject request
 *
 * @author Jesus Romero
 * @date 30/09/2020
 * @export
 */
export function processChangeStatus(request, operation = 'attend') {
  let api;
  let payload;
  let dialog;
  const code = getUriSegment(3);

  if (operation == 'attend') {
    payload = {
      rechazar: false,
    };
    dialog = showAttendConfirmationDialog();
  }

  if (operation == 'reject') {
    payload = {
      rechazar: true,
    };
    dialog = showRejectConfirmationDialog();
  }

  dialog.then(result => {
    if (result.isConfirmed) {
      switch (request) {
        case requestFormConstants.REQUEST_COMPRA_SOAT:
          api = apiChangeStatusCompraSoat(code, payload);
          break;
        case requestFormConstants.REQUEST_COTIZAR_SOAT:
          api = apiChangeStatusCotizacionSoat(code, payload);
          break;
        case requestFormConstants.REQUEST_AFILIAR_SEGURO_ESTUDIANTE:
          api = apiChangeStatusAfiliacionSeguroEstudiante(code, payload);
          break;
        case requestFormConstants.REQUEST_COTIZAR_SEGURO_VEHICULO:
          api = apiChangeStatusCotizacionVehiculoTodoRiesgo(code, payload);
          break;
      }
      api.then(() => {
        if (operation === 'reject') {
          showSuccessRejectDialog();
        } else {
          showSuccessAttendDialog();
        }
      });
    }
  });
}

export function attended(operation) {}

/**
 * Show dialog message asking for confirm rejecting
 *
 * @author Jesus Romero
 * @date 30/09/2020
 * @returns {Promise}
 */
function showRejectConfirmationDialog() {
  return Swal.fire({
    title: 'Rechazar solicitud',
    text: '¿Está seguro que quiere rechazar esta solicitud?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Rechazar',
    cancelButtonText: 'No rechazar',
  });
}

/**
 * Show dialog message asking for confirm attending
 *
 * @author Jesus Romero
 * @date 30/09/2020
 * @returns {*}
 */
function showAttendConfirmationDialog() {
  return Swal.fire({
    title: 'Marcar como atendido',
    text: '¿Está seguro que quiere marcar esta solicitud como atendida?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Si',
    cancelButtonText: 'No',
  });
}

/**
 * Show dialog message when reject is successful
 *
 * @author Jesus Romero
 * @date 30/09/2020
 */
function showSuccessRejectDialog() {
  Swal.fire({
    title: 'Solicitud rechazada',
    text: 'La solicitud ha sido marcada como rechazada ',
    icon: 'success',
    confirmButtonText: 'Aceptar',
  }).then(() => {
    window.location.reload();
  });
}

/**
 * Show dialog message when attend is succesful
 *
 * @author Jesus Romero
 * @date 30/09/2020
 */
function showSuccessAttendDialog() {
  Swal.fire({
    title: 'Solicitud atendida',
    text: 'La solicitud ha sido marcada como atendidad',
    icon: 'success',
    confirmButtonText: 'Aceptar',
  }).then(() => {
    window.location.reload();
  });
}
