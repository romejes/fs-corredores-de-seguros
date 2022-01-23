import 'bootstrap-table';
import 'bootstrap-table/src/locale/bootstrap-table-es-ES';
import { formatDate, returnUrl } from '../../shared/util';
import { routes } from '../routes';

const commonColumns = [
  {
    title: 'Codigo',
    field: 'solicitud.codigo',
  },
  {
    title: 'Solicitado Por',
    formatter: (value, row) => {
      if (row.tipo_cliente === 'J') {
        return row.razon_social;
      }

      let fullName = `${row.nombres} ${row.apellido_paterno}`;
      if (row.apellido_materno) {
        fullName += ` ${row.apellido_materno}`;
      }
      return fullName;
    },
  },
  {
    title: 'Fecha y Hora de Envio',
    formatter: (value, row) => {
      return formatDate(
        row.solicitud.fecha_hora_registro,
        'YYYY-MM-DD h:mm:ss',
        'DD [de] MMMM [de] YYYY h:mm a',
      );
    },
  },
  {
    title: 'Estado',
    formatter: (value, row) => {
      let badgeClassName = '';

      switch (row.solicitud.estado_solicitud.id) {
        case 1:
          badgeClassName = 'badge-warning';
          break;
        case 2:
          badgeClassName = 'badge-primary';
          break;
        case 3:
          badgeClassName = 'badge-success';
          break;
        case 4:
          badgeClassName = 'badge-danger';
          break;
      }

      return $('<span></span>', {
        class: `badge ${badgeClassName}`,
        text: row.solicitud.estado_solicitud.descripcion,
      }).prop('outerHTML');
    },
  },
  {
    field: 'solicitud.estado_solicitud.id',
    searchFormatter: true,
    visible: false,
  },
];

/**
 * Load table with Compra SOAT data
 *
 * @author Jesus Romero
 * @date 30/09/2020
 * @export
 */
export function loadTableCompraSoat() {
  $('#tbl-compras-soat').bootstrapTable({
    url: routes.ROUTE_GET_COMPRAS_SOAT,
    pagination: true,
    responseHandler: response => {
      return response.data;
    },
    columns: [
      ...commonColumns,
      {
        title: 'Acciones',
        formatter: (value, row) => {
          const detailButton = $('<a></a>', {
            class: 'btn',
            href: returnUrl(`intranet/compras/soat/${row.solicitud.codigo}`),
            html: '<i class="fas fa-list text-primary"></i>',
            title: 'Ver detalles',
          });

          return detailButton.prop('outerHTML');
        },
      },
    ],
  });
}

/**
 * Load table with Cotizaciones SOAT data
 *
 * @author Jesus Romero
 * @date 30/09/2020
 * @export
 */
export function loadTableCotizacionesSoat() {
  $('#tbl-cotizaciones-soat').bootstrapTable({
    url: routes.ROUTE_GET_COTIZACIONES_SOAT,
    pagination: true,
    responseHandler: response => {
      return response.data;
    },
    columns: [
      ...commonColumns,
      {
        title: 'Acciones',
        formatter: (value, row) => {
          const detailButton = $('<a></a>', {
            class: 'btn',
            href: returnUrl(
              `intranet/cotizaciones/soat/${row.solicitud.codigo}`,
            ),
            html: '<i class="fas fa-list text-primary"></i>',
            title: 'Ver detalles',
          });

          return detailButton.prop('outerHTML');
        },
      },
    ],
  });
}

/**
 * Load table with Cotizaciones Vehiculo Todo Riego data
 *
 * @author Jesus Romero
 * @date 30/09/2020
 * @export
 */
export function loadTableCotizacionesVehiculoTodoRiesgo() {
  $('#tbl-cotizaciones-vehiculo-todo-riesgo').bootstrapTable({
    url: routes.ROUTE_GET_COTIZACIONES_SEGURO_VEHICULO,
    pagination: true,
    responseHandler: response => {
      return response.data;
    },
    columns: [
      ...commonColumns,
      {
        title: 'Acciones',
        formatter: (value, row) => {
          const detailButton = $('<a></a>', {
            class: 'btn',
            href: returnUrl(
              `intranet/cotizaciones/vehiculo_todo_riesgo/${row.solicitud.codigo}`,
            ),
            html: '<i class="fas fa-list text-primary"></i>',
            title: 'Ver detalles',
          });

          return detailButton.prop('outerHTML');
        },
      },
    ],
  });
}

/**
 * Load table with Afiliacion Seguro Estudiante data
 *
 * @author Jesus Romero
 * @date 30/09/2020
 * @export
 */
export function loadTableAfiliacionesSeguroEstudiante() {
  $('#tbl-afiliaciones-seguro-estudiante').bootstrapTable({
    url: routes.ROUTE_GET_AFILIACION_SEGURO_ESTUDIANTE,
    pagination: true,
    responseHandler: response => {
      return response.data;
    },
    columns: [
      ...commonColumns,
      {
        title: 'Acciones',
        formatter: (value, row) => {
          const detailButton = $('<a></a>', {
            class: 'btn',
            href: returnUrl(
              `intranet/afiliaciones/seguro_estudiante/${row.solicitud.codigo}`,
            ),
            html: '<i class="fas fa-list text-primary"></i>',
            title: 'Ver detalles',
          });

          return detailButton.prop('outerHTML');
        },
      },
    ],
  });
}

/**
 * Apply search filters on each table
 *
 * @author Jesus Romero
 * @date 05/10/2020
 * @export
 */
export function filterTable() {
  const cliente = $('#txt-cliente').val();
  const estadoSolicitud = $('#sel-estado_solicitud').val();

  $('.table').bootstrapTable(
    'filterBy',
    {
      estado_solicitud: estadoSolicitud,
      cliente: cliente,
    },
    {
      filterAlgorithm: (row, filters) => {
        let clienteIsFound = false;
        let filterRow = false;
        const fullName = `${row.nombres} ${row.apellido_paterno} ${row.apellido_materno}`;

        if (filters.cliente == '') {
          clienteIsFound = true;
        } else {
          clienteIsFound = fullName.indexOf(filters.cliente) !== -1;
        }

        if (clienteIsFound && filters.estado_solicitud == -1) {
          filterRow = true;
        } else if (
          clienteIsFound &&
          filters.estado_solicitud == row.solicitud.estado_solicitud.id
        ) {
          filterRow = true;
        } else {
          filterRow = false;
        }
        return filterRow;
      },
    },
  );
}

/**
 * Delete all values of filter inputs and restore table data
 *
 * @author Jesus Romero
 * @date 05/10/2020
 * @export
 */
export function cleanFilterTable() {
  $('#txt-cliente').val('');
  $('#sel-estado_solicitud').val(-1);
  filterTable();
}

/**
 *
 *
 * @author Jesus Romero
 * @date 06/10/2020
 * @export
 */
export function downloadExcelFile() {
  window.location.href = returnUrl('afiliaciones/seguro_estudiante/reporte');
}
