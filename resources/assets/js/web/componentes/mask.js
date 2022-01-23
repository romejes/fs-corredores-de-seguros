import IMask from 'imask';
import moment from 'moment';

export function crearMascaraFecha(elementId, minDate, maxDate) {
  const momentFormat = 'DD/MM/YYYY';

  IMask(document.getElementById(elementId), {
    mask: Date,
    lazy: false,
    pattern: momentFormat,
    min: minDate,
    max: maxDate,
    overwrite: true,
    format: function(date) {
      return moment(date).format(momentFormat);
    },
    parse: function(str) {
      return moment(str, momentFormat);
    },
    blocks: {
      DD: {
        mask: IMask.MaskedRange,
        from: 1,
        to: 31,
        maxLength: 2,
        placeholderChar: '_',
      },
      MM: {
        mask: IMask.MaskedRange,
        from: 1,
        to: 12,
        maxLength: 2,
        placeholderChar: '_',
      },
      YYYY: {
        mask: IMask.MaskedRange,
        from: minDate.getFullYear(),
        to: maxDate.getFullYear(),
        maxLength: 4,
        placeholderChar: '_',
      },
    },
  });
}
