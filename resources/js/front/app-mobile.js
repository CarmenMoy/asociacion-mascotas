require('./bootstrap');

// con este comando, importamos la variable creada en la carpeta de java mobile en documento menu y 
// denominada "renderMenu".
// Así con cada comando y documento de cada carpeta...
import {renderMenu} from './mobile/menu.js';
import {plusMinus} from './mobile/plusMinus.js';
import {renderTabs} from './mobile/tabs.js';
import {renderForm} from './mobile/form.js';
import {renderCkeditor} from './mobile/ckeditor.js';

// A su vez de darle importar (import), debemos detallar variable y "()", para que lo importe todo.
// Todo su contenido.
renderMenu();
plusMinus();
renderTabs();
renderForm();
renderCkeditor();
