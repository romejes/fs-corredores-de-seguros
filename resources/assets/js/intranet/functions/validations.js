import 'jquery-validation';
import 'jquery-validation/dist/localization/messages_es_PE';

/**
 * Set default configuration for jQuery Validation Plugin
 *
 * @author Jesus Romero
 * @date 28/09/2020
 * @export
 */
export function setDefaultSettings() {
  $.validator.setDefaults({
    lang: 'es',
    errorElement: 'span',
    errorPlacement: (error, element) => {
      setErrorPlacement(error, element);
    },
    highlight: (element, errorClass, validClass) => {
      highlightElement(element);
    },
    unhighlight: (element, errorClass, validClass) => {
      unhighlightElement(element);
    },
  });
}

/**
 * Set how error messages will be placed on form
 *
 * @author Jesus Romero
 * @date 28/09/2020
 * @export
 * @param {HTMLElement} error
 * @param {JQuery<HTMLElement>} element
 */
export function setErrorPlacement(error, element) {
  error.addClass('invalid-feedback');
  element.closest('.form-group').append(error);
}

/**
 * Set how invalid element must be highlight
 *
 * @author Jesus Romero
 * @date 28/09/2020
 * @export
 * @param {HTMLElement} element
 * @returns {boolean|void}
 */
export function highlightElement(element) {
  $(element).addClass('is-invalid');
}

/**
 * Set how element was invalid must be unhighlight
 *
 * @author Jesus Romero
 * @date 28/09/2020
 * @export
 * @param {HTMLElement} element
 * @returns {boolean|void}
 */
export function unhighlightElement(element) {
  $(element).removeClass('is-invalid');
}

/**
 * Return if control is valid or not
 *
 * @author Jesus Romero
 * @date 28/09/2020
 * @export
 * @param {HTMLElement} element
 * @returns {boolean}
 */
export function isValid(element) {
  return $(element).valid();
}

/**
 * Set validation rules on login form
 *
 * @author Jesus Romero
 * @date 30/09/2020
 * @export
 */
export function setValidationLogin() {
  $('#frm-login').validate({
    rules: {
      usuario: {
        required: true,
      },
      contrasena: {
        required: true,
      },
    },
  });
}
