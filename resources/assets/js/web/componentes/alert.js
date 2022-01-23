import swal from 'sweetalert2';

export function mostrarAlerta(titulo, mensaje, tipo = 'ok') {
  let icono = 'success';
  let textoConfirmacion = "Aceptar";

  if (tipo === 'error') {
    icono = tipo
  }
  
  swal.fire({
    title: titulo,
    text: mensaje,
    icon: icono,
    confirmButtonText: textoConfirmacion
  });
}

export function mostrarAlertaEnProgreso() {
  swal.fire({
    title: 'Espere',
    allowEscapeKey: false,
    allowOutsideClick: false,
    onBeforeOpen: () => swal.showLoading(),
  });
}
