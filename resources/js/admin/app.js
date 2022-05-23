require('./bootstrap');

import {renderMenu} from './desktop/menu.js';
import {plusMinus} from './desktop/plusMinus.js';
import {renderTabs} from './desktop/tabs.js';
import {renderForm} from './desktop/form.js';
import {renderTable} from './desktop/table.js';
import {renderCkeditor} from './desktop/ckeditor.js';

// A su vez de darle importar (import), debemos detallar variable y "()", para que lo importe todo.
// Todo su contenido.
renderMenu();
plusMinus();
renderTabs();
renderForm();
renderTable();
renderCkeditor();
