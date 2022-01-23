import { existsElement } from '../../shared/util';
import {
  cleanFilterTable,
  downloadExcelFile,
  filterTable,
  loadTableAfiliacionesSeguroEstudiante,
} from '../functions/tables';
import { processChangeStatus } from '../functions/forms';
import { requestFormConstants } from '../../shared/constants';

if (existsElement('#tbl-afiliaciones-seguro-estudiante')) {
  loadTableAfiliacionesSeguroEstudiante();

  document
    .getElementById('btn-buscar')
    .addEventListener('click', () => filterTable());

  document
    .getElementById('btn-limpiar')
    .addEventListener('click', () => cleanFilterTable());

  document
    .getElementById('btn-excel')
    .addEventListener('click', () => downloadExcelFile());
}

if (existsElement('#detail-afiliacion-seguro-estudiante')) {
  document
    .getElementById('btn-rechazar')
    .addEventListener('click', () =>
      processChangeStatus(
        requestFormConstants.REQUEST_AFILIAR_SEGURO_ESTUDIANTE,
        'reject',
      ),
    );
  document
    .getElementById('btn-marcar-atendido')
    .addEventListener('click', () =>
      processChangeStatus(
        requestFormConstants.REQUEST_AFILIAR_SEGURO_ESTUDIANTE,
      ),
    );
}
