require('./bootstrap');

import {renderMenu} from './mobile/menu.js';
import {plusMinus} from './mobile/plusMinus.js';
import {renderTabs} from './mobile/tabs.js';
import {renderForm} from './mobile/form.js';
import {renderCkeditor} from './mobile/ckeditor.js';



renderMenu();
plusMinus();
renderTabs();
renderForm();
renderCkeditor();