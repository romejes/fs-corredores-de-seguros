import { inicializarMapa } from './componentes/map';
import { esValido } from './componentes/forms';
import { procesarFormulario } from './procesos/proceso_contacto';

$(window).on('load', () => {
  inicializarMapa('map', -18.018382982450568, -70.25518439834747);
});

$('#btn-send').on('click', () => {
  if (!esValido($('#frm-contact'))) {
    return false;
  }
  procesarFormulario();
});
