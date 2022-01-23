import { existsElement } from '../../shared/util';
import { processLoginForm } from '../functions/forms';
import { logout } from '../functions/template';
import { setValidationLogin } from '../functions/validations';

if (existsElement('#frm-login')) {
  setValidationLogin();

  document
    .getElementById('btn-login')
    .addEventListener('click', () => processLoginForm());

  document.getElementById('txt-contrasena').addEventListener('keyup', e => {
    if (e.key === 'Enter') {
      processLoginForm();
    }
  });
}

if (existsElement('#btn-logout')) {
  document
    .getElementById('btn-logout')
    .addEventListener('click', () => logout());
}
