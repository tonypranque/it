import './bootstrap';
import { initTypewriter } from './typewriter.js';
/*import '../css/mario.scss';
import '../js/mario.js';*/
/*import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();*/

// resources/js/app.js
import Alpine from 'alpinejs';
import intersect from '@alpinejs/intersect';

Alpine.plugin(intersect);
window.Alpine = Alpine;
Alpine.start();

document.addEventListener('DOMContentLoaded', () => {

    initTypewriter('Ит');

});
