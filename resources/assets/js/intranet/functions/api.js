import axios from 'axios';
import { routes } from '../routes';

/**
 * Call endpoint for login
 *
 * @author Jesus Romero
 * @date 30/09/2020
 * @export
 * @param {*} payload
 * @returns {Promise}
 */
export function apiLogin(payload) {
  return axios.post(routes.ROUTE_LOGIN, payload);
}

/**
 * Call endpoint for change Compra Soat register status
 *
 * @author Jesus Romero
 * @date 30/09/2020
 * @export
 * @param {string} code
 * @param {*} payload
 * @returns {Promise}
 */
export function apiChangeStatusCompraSoat(code, payload) {
  return axios.put(
    `${routes.ROUTE_PUT_CAMBIAR_ESTADO_COMPRA_SOAT}/${code}`,
    payload,
  );
}

/**
 * Call endpoint for change Cotizacion Soat register status
 *
 * @author Jesus Romero
 * @date 30/09/2020
 * @export
 * @param {string} code
 * @param {*} payload
 * @returns {Promise}
 */
export function apiChangeStatusCotizacionSoat(code, payload) {
  return axios.put(
    `${routes.ROUTE_PUT_CAMBIAR_ESTADO_COTIZACION_SOAT}/${code}`,
    payload,
  );
}

/**
 * Call endpoint for change Cotizacion Seguro Vehiculo Todo Riesgo register status
 *
 * @author Jesus Romero
 * @date 30/09/2020
 * @export
 * @param {string} code
 * @param {*} payload
 * @returns {Promise}
 */
export function apiChangeStatusCotizacionVehiculoTodoRiesgo(code, payload) {
  return axios.put(
    `${routes.ROUTE_PUT_CAMBIAR_ESTADO_COTIZACION_VEHICULO_TODO_RIESGO}/${code}`,
    payload,
  );
}

/**
 * Call endpoint for change Afiliacion Seguro Estudiante register status
 *
 * @author Jesus Romero
 * @date 30/09/2020
 * @export
 * @param {string} code
 * @param {*} payload
 * @returns {Promise}
 */
export function apiChangeStatusAfiliacionSeguroEstudiante(code, payload) {
  return axios.put(
    `${routes.ROUTE_PUT_CAMBIAR_ESTADO_AFILIACION_SEGURO_ESTUDIANTE}/${code}`,
    payload,
  );
}
