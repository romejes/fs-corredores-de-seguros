import 'jquery-validation';
import 'jquery-validation/dist/localization/messages_es_PE';
import 'jquery-validation/dist/additional-methods';

import { ajustarPestana } from './wizard';
import { returnUrl } from '../../shared/util';
import { tipoClienteConstants } from '../../shared/constants';
import axios from 'axios';
import { cambiarReglasFechaVencimiento } from '../validaciones/validacion_cotizar_soat';
import { cambiarReglasTipoCliente } from '../validaciones/validacion_general';

/**
 * Inicializar valores por defecto de jQuery Validate
 */
export function configurarValidacion() {
  $.validator.setDefaults({
    lang: 'es',
    errorElement: 'span',
    errorPlacement: (error, element) => {
      colocarMensajeError(error, element);
      ajustarPestana();
    },
    highlight: element => {
      aplicarEstilos(element);
    },
    unhighlight: element => {
      aplicarEstilos(element, false);
      ajustarPestana();
    },
  });
}

/**
 * Verifica si un control es valido o no
 * @param {JQuery<HTMLElement>} control Control a validar
 */
export function esValido(control) {
  return $(control).valid();
}

/**
 * Ubica un mensaje de error correspondiente al control
 * @param {HTMLElement} error
 * @param {JQuery<HTMLElement>} control
 */
export function colocarMensajeError(error, control) {
  const etiquetaControl = control.prop('tagName').toLowerCase();
  const tipoControl = control.attr('type');

  if (etiquetaControl === 'input' && tipoControl === 'radio') {
    control
      .closest('[class^="col-"]')
      .eq(0)
      .append(error);
  } else if (etiquetaControl === 'input' && tipoControl === 'file') {
    control
      .closest('.form-group')
      .eq(0)
      .append(error);
  } else {
    control.parent().append(error);
  }

  error.addClass('invalid-feedback');
}

/**
 * Aplicar estilos para resaltar el control que no pasó la validacion
 * @param {HTMLElement} control
 */
export function aplicarEstilos(control, resaltar = true) {
  const elemento = obtenerContenedorControlNoValidado(control);

  if (resaltar) {
    elemento.addClass('is-invalid');
  } else {
    elemento.removeClass('is-invalid');
  }
}

/**
 * Obtiene el contenedor del control que no ha sido validado
 * @param {JQuery<HTMLElement>} control
 */
function obtenerContenedorControlNoValidado(control) {
  const etiquetaControl = $(control)
    .prop('tagName')
    .toLowerCase();
  const tipoControl = $(control).attr('type');
  let contenedorControlNoValidado = $(control);

  if (etiquetaControl === 'input' && tipoControl === 'radio') {
    const nombreElemento = $(control).attr('name');
    contenedorControlNoValidado = $(`input[name=${nombreElemento}]`).closest(
      '.form-check',
    );
  } else if (etiquetaControl === 'input' && tipoControl === 'file') {
    contenedorControlNoValidado = $(control).closest('.custom-file');
  }
  return contenedorControlNoValidado;
}

/**
 * Validar parte del proceso del formulario
 * @param {number} indice
 */
export function validarPaso(indice) {
  const pestana = $('.wizard .tab-pane').eq(indice);
  const controles = pestana.find('input, select, textarea');
  let controlesNoValidos = 0;

  controles.each((indice, control) => {
    if (!esValido($(control))) {
      controlesNoValidos++;
    }
  });
  return !(controlesNoValidos > 0);
}

export function mostrarErroresValidacionServidor() {
  $('span.invalid-feedback').remove();
  let primerControlNoValidado;

  for (const property in messages) {
    const control = $(`[name=${property}]`).eq(0);
    const elementoError = $('<span></span>', {
      text: messages[property][0],
    });

    if (typeof primerControlNoValidado === 'undefined') {
      primerControlNoValidado = control;
    }

    aplicarEstilos(control, false);
    aplicarEstilos(control);
    colocarMensajeError(elementoError, control);
  }

  $('.wizard').smartWizard(
    'goToStep',
    primerControlNoValidado.closest('.tab-pane').index(),
  );
}

export function cargarListaDeDocumentosDeIdentidad(tipoCliente) {
  const url =
    returnUrl('tipos-documento-identidad') + '?tipo_cliente=' + tipoCliente;

  axios.get(url).then(response => {
    const data = response.data.data;
    const selectTipoDocumentoIdentidad = $('#ddo-tipo-documento-identidad');
    const optionsSelectTipoDocumentoIdentidad = selectTipoDocumentoIdentidad.children();

    for (let i = optionsSelectTipoDocumentoIdentidad.length - 1; i >= 0; i--) {
      $(optionsSelectTipoDocumentoIdentidad)
        .eq(i)
        .remove();
    }

    data.forEach(item => {
      const nuevoOption = $('<option></option>', {
        value: item.id,
        text: item.descripcion,
      });
      selectTipoDocumentoIdentidad.append(nuevoOption);
    });
  });
}

export function mostrarCamposTipoCliente(tipoCliente) {
  if (tipoCliente === tipoClienteConstants.PERSONA_NATURAL) {
    $('#txt-nombres')
      .closest('.form-group')
      .removeClass('d-none');

    $('#txt-apellido-paterno')
      .closest('.form-group')
      .removeClass('d-none');

    $('#txt-apellido-materno')
      .closest('.form-group')
      .removeClass('d-none');

    $('#txt-razon-social')
      .closest('.form-group')
      .addClass('d-none');
  }

  if (tipoCliente === tipoClienteConstants.PERSONA_JURIDICA) {
    $('#txt-nombres')
      .closest('.form-group')
      .addClass('d-none');

    $('#txt-apellido-paterno')
      .closest('.form-group')
      .addClass('d-none');

    $('#txt-apellido-materno')
      .closest('.form-group')
      .addClass('d-none');

    $('#txt-razon-social')
      .closest('.form-group')
      .removeClass('d-none');
  }
  cambiarReglasTipoCliente(tipoCliente);
}

export function mostrarControlesOpcionTengoSoat() {
  const contenedorControl = $('#txt-fecha-vencimiento').closest('.form-group');
  const tieneSoat = $('input[name=tiene_soat]:checked').val();

  if (tieneSoat == 1) {
    contenedorControl.removeClass('d-none');
    cambiarReglasFechaVencimiento();
  } else {
    contenedorControl.addClass('d-none');
    cambiarReglasFechaVencimiento(false);
  }
}
