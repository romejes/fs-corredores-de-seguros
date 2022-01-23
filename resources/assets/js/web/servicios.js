//  Reglas de validacion
import './validaciones/validacion_afiliacion_seguro_estudiante';
import './validaciones/validacion_cotizar_seguro_vehiculo';
import './validaciones/validacion_cotizar_soat';

import * as objWizard from './componentes/wizard';
import * as objFile from './componentes/file_input';
import * as objMask from './componentes/mask';

import * as procesoAfiliarSeguroEstudiante from './procesos/proceso_afiliar_seguro_estudiante';
import * as procesoCotizarSeguroVehicular from './procesos/proceso_cotizar_seguro_vehicular';
import * as procesoCotizarSoat from './procesos/proceso_cotizar_soat';

import {
  cargarListaDeDocumentosDeIdentidad,
  esValido,
  mostrarCamposTipoCliente,
  mostrarControlesOpcionTengoSoat,
} from './componentes/forms';

//  Wizard
const wizard = $('.wizard');
if (wizard.length > 0) {
  const opcionesWizard = {
    theme: 'dots',
    lang: {
      previous: 'Anterior',
      next: 'Siguiente',
    },
    anchorSettings: {
      markAllPreviousStepsAsDone: false,
    },
    selected: 0,
    toolbarSettings: {
      toolbarExtraButtons: [
        $('<button></button>', {
          text: 'Enviar solicitud',
          class: 'button button-primary',
          id: 'btn-send',
          type: 'button',
          disabled: true,
        }),
      ],
    },
  };
  objWizard.inicializar(wizard, opcionesWizard);
}

//  File Input
const fileInput = $('input[type="file"]');
if (fileInput.length > 0) {
  objFile.inicializar();
}

//  Mask
const txtFechaNacimiento = $('input#txt-fecha-nacimiento');
if (txtFechaNacimiento.length === 1) {
  const minDate = new Date(1970, 0, 1);
  const maxDate = new Date(new Date().getFullYear() - 18, 0, 1);
  objMask.crearMascaraFecha('txt-fecha-nacimiento', minDate, maxDate);
}

const txtFechaVencimiento = $('input#txt-fecha-vencimiento');
if (txtFechaVencimiento.length === 1) {
  const minDate = new Date();
  const maxDate = new Date(new Date().getFullYear() + 10, 11, 31);
  objMask.crearMascaraFecha('txt-fecha-vencimiento', minDate, maxDate);
}

//  Procesos
const frmAfiliarSeguroEstudiante = $('form#frm-afiliar-seguro-estudiante');
if (frmAfiliarSeguroEstudiante.length === 1) {
  $('#btn-send').on('click', () => {
    if (!esValido(frmAfiliarSeguroEstudiante)) {
      return false;
    }
    procesoAfiliarSeguroEstudiante.procesarFormulario();
  });
}

const frmCotizarSeguroVehicular = $('form#frm-cotizar_seguro_vehicular');
if (frmCotizarSeguroVehicular.length === 1) {
  //  Enviar datos desde formulario
  $('#btn-send').on('click', () => {
    if (!esValido(frmCotizarSeguroVehicular)) {
      return false;
    }
    procesoCotizarSeguroVehicular.procesarFormulario();
  });
}

const frmCotizarSoat = $('form#frm-cotizar_soat');
if (frmCotizarSoat.length === 1) {
  //  Enviar datos desde formulario
  $('#btn-send').on('click', () => {
    if (!esValido(frmCotizarSoat)) {
      return false;
    }
    procesoCotizarSoat.procesarFormulario();
  });
}

//  Mostrar controles segun el tipo de cliente
const radioTipoCliente = $('input[name=tipo_cliente]');
if (radioTipoCliente) {
  radioTipoCliente.on('change', event => {
    const tipoCliente = $(event.target).val();
    mostrarCamposTipoCliente(tipoCliente);
    cargarListaDeDocumentosDeIdentidad(tipoCliente);
    objWizard.ajustarPestana();
  });
}

//  Mostrar control fecha de vencimiento
const radioTieneSoat = $('input[name=tiene_soat]');
if (radioTieneSoat) {
  radioTieneSoat.on('change', event => {
    mostrarControlesOpcionTengoSoat();
    objWizard.ajustarPestana();
  });
}

$('#sel-servicios').on('change', ev => {
  console.log;
  const url = $(ev.target)
    .find(':selected')
    .data('href');
  window.location.href = url;
});

$(document).on('ready', () => {
  console.log(document.getElementsByTagName('section')[0]);
  document.querySelectorAll('section')[0].focus();
});

$("input[type=text]").on('input', (ev) =>{
  const input = $(ev.target)
  const valueInput = input.val()
  input.val(valueInput.toUpperCase())
})

$("input[type=email]").on('input', (ev) =>{
  const input = $(ev.target)
  const valueInput = input.val()
  input.val(valueInput.toLowerCase())
})