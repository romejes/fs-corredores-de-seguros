import { returnUrl } from '../shared/util';

export const routes = {
  ROUTE_LOGIN: returnUrl('login'),

  ROUTE_DASHBOARD: returnUrl('intranet'),

  ROUTE_LOGOUT: returnUrl('logout'),

  ROUTE_GET_COMPRAS_SOAT: returnUrl('compras/soat'),

  ROUTE_GET_COTIZACIONES_SOAT: returnUrl('cotizaciones/soat'),

  ROUTE_GET_COTIZACIONES_SEGURO_VEHICULO: returnUrl(
    'cotizaciones/vehiculo_todo_riesgo',
  ),

  ROUTE_GET_AFILIACION_SEGURO_ESTUDIANTE: returnUrl(
    'afiliaciones/seguro_estudiante',
  ),

  ROUTE_PUT_CAMBIAR_ESTADO_COMPRA_SOAT: returnUrl('compras/soat'),

  ROUTE_PUT_CAMBIAR_ESTADO_COTIZACION_SOAT: returnUrl('cotizaciones/soat'),

  ROUTE_PUT_CAMBIAR_ESTADO_AFILIACION_SEGURO_ESTUDIANTE: returnUrl(
    'afiliaciones/seguro_estudiante',
  ),

  ROUTE_PUT_CAMBIAR_ESTADO_COTIZACION_VEHICULO_TODO_RIESGO: returnUrl(
    'cotizaciones/vehiculo_todo_riesgo',
  ),
};
