import 'admin-lte';
import Swal from 'sweetalert2';
import { routes } from '../routes';

/**
 * Show a dialog box asking confirmation to logout
 *
 * @author Jesus Romero
 * @date 30/09/2020
 * @export
 */
export function logout() {
  Swal.fire({
    title: 'Salir del Sistema',
    text: '¿Está seguro de que desea salir del sistema?',
    icon: 'question',
    showCancelButton: true,
    confirmButtonText: 'Si',
    cancelButtonText: 'No',
    focusConfirm: false,
    focusCancel: true,
    allowOutsideClick: false,
    allowEscapeKey: false,
  }).then(result => {
    if (result.value) {
      window.location.href = routes.ROUTE_LOGOUT;
    }
  });
}
