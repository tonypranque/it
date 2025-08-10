// resources/js/nav.js

class Navigation {
    constructor() {
        this.header = document.querySelector('header');
        this.isMobileMenuOpen = false;
        this.mobileMenu = document.querySelector('.mobile-menu-container');
        this.menuButton = document.querySelector('[data-menu-toggle]');
        this.menuIconOpen = document.querySelector('.menu-icon-open');
        this.menuIconClose = document.querySelector('.menu-icon-close');

        this.init();
    }

    init() {
        this.setupMobileMenu();
        this.setupNavigationListeners();
    }

    setupMobileMenu() {
        if (!this.mobileMenu || !this.menuButton) return;

        // Обработчик кнопки меню
        this.menuButton.addEventListener('click', (e) => {
            e.preventDefault();
            this.toggleMobileMenu();
        });

        // Обработчик закрытия меню по клику вне области
        const backdrop = this.mobileMenu.querySelector('.mobile-menu-backdrop');
        if (backdrop) {
            backdrop.addEventListener('click', () => {
                this.closeMobileMenu();
            });
        }

        // Обработчик клавиши Escape
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && this.isMobileMenuOpen) {
                this.closeMobileMenu();
            }
        });

        // Добавляем обработчики для ссылок меню
        const menuLinks = this.mobileMenu.querySelectorAll('.mobile-menu-link');
        menuLinks.forEach(link => {
            link.addEventListener('click', () => {
                this.closeMobileMenu();
            });
        });
    }

    toggleMobileMenu() {
        if (this.isMobileMenuOpen) {
            this.closeMobileMenu();
        } else {
            this.openMobileMenu();
        }
    }

    openMobileMenu() {
        this.isMobileMenuOpen = true;
        this.mobileMenu.classList.remove('hidden');

        // Анимация открытия
        requestAnimationFrame(() => {
            this.mobileMenu.classList.add('opacity-100');
            this.mobileMenu.querySelector('.mobile-menu-backdrop').classList.add('opacity-100');
            this.mobileMenu.querySelector('.mobile-menu-content').classList.remove('translate-x-full');
            this.mobileMenu.querySelector('.mobile-menu-content').classList.add('translate-x-0');
        });

        // Меняем иконку
        if (this.menuIconOpen && this.menuIconClose) {
            this.menuIconOpen.classList.add('hidden');
            this.menuIconClose.classList.remove('hidden');
        }

        // Предотвращаем скролл body
        document.body.classList.add('overflow-hidden');
    }

    closeMobileMenu() {
        this.isMobileMenuOpen = false;

        // Анимация закрытия
        this.mobileMenu.classList.remove('opacity-100');
        this.mobileMenu.querySelector('.mobile-menu-backdrop').classList.remove('opacity-100');
        this.mobileMenu.querySelector('.mobile-menu-content').classList.remove('translate-x-0');
        this.mobileMenu.querySelector('.mobile-menu-content').classList.add('translate-x-full');

        // Меняем иконку обратно
        if (this.menuIconOpen && this.menuIconClose) {
            this.menuIconOpen.classList.remove('hidden');
            this.menuIconClose.classList.add('hidden');
        }

        // Скрываем меню после завершения анимации
        setTimeout(() => {
            if (!this.isMobileMenuOpen) {
                this.mobileMenu.classList.add('hidden');
            }
        }, 300);

        // Восстанавливаем скролл body
        document.body.classList.remove('overflow-hidden');
    }

    setupNavigationListeners() {
        // Обработчики для навигации
        document.addEventListener('DOMContentLoaded', () => {
            // При переходе по якорям плавно скроллим
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    const href = this.getAttribute('href');
                    if (href === '#') return;

                    const target = document.querySelector(href);
                    if (target) {
                        e.preventDefault();
                        const headerOffset = 80; // Высота хедера
                        const elementPosition = target.getBoundingClientRect().top;
                        const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                        window.scrollTo({
                            top: offsetPosition,
                            behavior: 'smooth'
                        });
                    }
                });
            });
        });

        // При переходе между страницами закрываем меню
        const handleLocationChange = () => {
            this.closeMobileMenu();
        };

        // Для разных типов навигации
        window.addEventListener('popstate', handleLocationChange);

        // Мутация observer для SPA
        let oldHref = document.location.href;
        const body = document.querySelector("body");
        if (body) {
            const observer = new MutationObserver(() => {
                if (oldHref !== document.location.href) {
                    oldHref = document.location.href;
                    handleLocationChange();
                }
            });
            observer.observe(body, { childList: true, subtree: true });
        }
    }
}

// Инициализируем навигацию когда DOM готов
document.addEventListener('DOMContentLoaded', () => {
    window.navigation = new Navigation();
});

// Также инициализируем при полной загрузке страницы
window.addEventListener('load', () => {
    if (typeof window.navigation === 'undefined') {
        window.navigation = new Navigation();
    }
});

export default Navigation;
