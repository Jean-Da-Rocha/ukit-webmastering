import Alpine from 'alpinejs';
import Screen from '@alpine-collective/toolkit-screen';

window.Alpine = Alpine;
window.UIkit = require('uikit');

Alpine.plugin(Screen);

Alpine.start();
