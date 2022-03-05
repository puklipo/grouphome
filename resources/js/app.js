require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import smoothscroll from 'smoothscroll-polyfill';

smoothscroll.polyfill();
