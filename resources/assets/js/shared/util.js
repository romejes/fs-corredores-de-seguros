import moment from 'moment';

/**
 * Check if an DOM element exists
 *
 * @author Jesus Romero
 * @date 30/09/2020
 * @export
 * @param {string} selector
 * @returns {boolean}
 */
export function existsElement(selector) {
  return document.querySelectorAll(selector).length > 0;
}

/**
 * Return URI complete with segments concatenated
 *
 * @author Jesus Romero
 * @date 30/09/2020
 * @export
 * @param {string | null} [uriSegments=undefined]
 * @returns {string}
 */
export function returnUrl(uriSegments = undefined) {
  const baseUrl = window.location.protocol + '//' + window.location.hostname;
  if (typeof uriSegments === 'undefined') {
    return baseUrl;
  }
  return `${baseUrl}/${uriSegments}`;
}

/**
 * Return a segment uri from current url
 *
 * @author Jesus Romero
 * @date 01/10/2020
 * @export
 * @param {number} indexSegment
 * @returns {string}
 */
export function getUriSegment(indexSegment) {
  const uri = window.location.href;
  const segments = uri.split('/');
  segments.splice(0, 3);
  return segments[indexSegment];
}

/**
 * Change first letter of string to uppercase
 * @param {string} text
 */
export const capitalizeFirstLetter = text => {
  return text.charAt(0).toUpperCase() + text.slice(1);
};

/**
 * Return string date to specified format
 *
 * @author Jesus Romero
 * @date 01/10/2020
 * @export
 * @param {string} dateString
 * @param {string} formatOrigin
 * @param {string} formatTarget
 * @returns {string}
 */
export function formatDate(dateString, formatOrigin, formatTarget) {
  return moment(dateString, formatOrigin)
    .locale('es_MX')
    .format(formatTarget);
}

