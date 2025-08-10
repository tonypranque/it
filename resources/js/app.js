import './bootstrap';

import intersect from '@alpinejs/intersect';

import Navigation from './nav';

// Инициализируем навигацию
window.Navigation = Navigation;

// Делаем доступным глобально
window.addEventListener('DOMContentLoaded', () => {
    if (typeof window.navigation === 'undefined') {
        window.navigation = new Navigation();
    }
});

Alpine.plugin(intersect);


