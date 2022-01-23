import { setDefaultSettings } from '../functions/validations';
import { existsElement } from '../../shared/util';

if (existsElement('form')) {
  setDefaultSettings();
}
