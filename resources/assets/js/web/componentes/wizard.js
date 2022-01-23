import 'smartwizard';
import { cargarListaDeDocumentosDeIdentidad, validarPaso } from './forms';

/**
 * Inicializar plugin SmartWizard
 * @param {JQuery<HTMLElement>} elemento
 * @param {JQuerySmartwizard.SmartWizardOptions} opciones
 */
export function inicializar(elemento, opciones = {}) {
  elemento.smartWizard(opciones);

  elemento.smartWizard('reset');

  elemento.on(
    'leaveStep',
    (e, anchorObject, currentStepIndex, nextStepIndex, stepDirection) => {
      if (stepDirection === 'forward') {
        const validacion = validarPaso(currentStepIndex);
        const contenidoPestana = $('.wizard .tab-pane').eq(currentStepIndex);

        ajustarPestana(contenidoPestana);
        return validacion;
      }
    },
  );

  elemento.on('showStep', (e, anchorObject, stepIndex, stepDirection) => {
    const numeroPestanas = $('.wizard .nav  .nav-link').length;
    document.getElementsByTagName('section')[0].scrollIntoView();

    if (stepDirection === 'forward' && stepIndex === numeroPestanas - 2) {
      $('#btn-send').removeAttr('disabled');
    } else {
      $('#btn-send').attr('disabled', 'disabled');
    }
  });

  //  Mantener el enfoque en el primer control
  document
    .querySelectorAll('form input, form select, form textarea')[0]
    .focus();
}

export function ajustarPestana() {
  const pestanaActiva = $(".wizard .tab-pane:not([style*='display: none'])");
  $('.wizard .tab-content')
    .eq(0)
    .height(pestanaActiva.innerHeight());
}

export function reiniciar() {
  const formOnWizard = document.querySelector('.wizard form');
  formOnWizard.reset();
  $('.wizard').smartWizard('reset');

  ajustarPestana();
}
