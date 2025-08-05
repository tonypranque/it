<header
    x-data="{ isScrolled: false, isMobileMenuOpen: false }"
    x-init="
    const update = () => isScrolled = window.scrollY > 50;
    update();
    window.addEventListener('scroll', update);
  "
    :class="{ 'bg-white/95 backdrop-blur-md shadow-lg': isScrolled, 'bg-transparent': !isScrolled }"
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-300"
>
    <div class="container mx-auto px-4 py-4">
        <div class="flex items-center justify-between">
            <a href="/" class="flex items-center space-x-3">
                <div class="w-12 h-12 bg-primary rounded-lg flex items-center justify-center">
                    {{--<img src="/images/logo.png" alt="Logo" class="w-8 h-8">--}}
                    <svg width="32px" height="32px" viewBox="0 -0.5 21 21" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#ffffff" transform="matrix(-1, 0, 0, 1, 0, 0)" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>Карьяла тэк - KarjalaTech</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke-width="0.00021000000000000004" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-99.000000, -680.000000)" fill="#ffffff"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M50.21875,525 L52.31875,525 L52.31875,523 L50.21875,523 L50.21875,525 Z M61.9,538 L59.8,538 L59.8,532 L58.88125,532 L57.7,532 L49.3,532 L47.5276,532 L47.2,532 L47.2,538 L45.1,538 L45.1,526.837 L47.2,524.837 L47.2,528 L48.11875,528 L49.3,528 L57.7,528 L59.47135,528 L59.8,528 L59.8,522 L61.9,522 L61.9,538 Z M49.3,538 L57.7,538 L57.7,534 L49.3,534 L49.3,538 Z M49.3,522.837 L50.17885,522 L57.7,522 L57.7,526 L49.3,526 L49.3,522.837 Z M63.9664,520 L61.8664,520 L49.3,520 L49.3,520.008 L47.2084,522 L47.2,522 L47.2,522.008 L43.0084,526 L43,526 L43,538 L43,540 L45.1,540 L61.8664,540 L63.9664,540 L64,540 L64,538 L64,522 L64,520 L63.9664,520 Z" id="save_item-[#ffffff]"> </path> </g> </g> </g> </g></svg>
                    <span class="mono-font text-white text-sm font-semibold"></span>
                </div>
                <div>
                    <h1 class="text-xl font-bold text-primary">{{ config('app.name') }}</h1>
                    <p class="text-xs text-muted-foreground mono-font">ИТ решения</p>
                </div>
            </a>

            <nav class="hidden md:flex space-x-8">
                <a href="/services" class="text-foreground hover:text-primary">Услуги</a>
                <a href="/#about" class="text-foreground hover:text-primary">О нас</a>
                <a href="/#portfolio" class="text-foreground hover:text-primary">Клиенты</a>
                <a href="/#contact" class="text-foreground hover:text-primary">Контакты</a>
            </nav>

            <div class="flex items-center space-x-4">
                <button class="hidden md:inline-flex retro-button px-4 py-2 rounded-lg cursor-pointer">Стать клиентом</button>
                <button @click="isMobileMenuOpen = !isMobileMenuOpen" class="md:hidden p-2">
                    <svg x-show="!isMobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                    <svg x-show="isMobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <div x-show="isMobileMenuOpen" x-cloak class="md:hidden mt-4 space-y-2">
            <a href="#services" @click="isMobileMenuOpen = false" class="block">Услуги</a>
            <a href="#about" @click="isMobileMenuOpen = false" class="block">О нас</a>
            <a href="#portfolio" @click="isMobileMenuOpen = false" class="block">Клиенты</a>
            <a href="#contact" @click="isMobileMenuOpen = false" class="block">Контакты</a>
            <a href="#contact" @click="isMobileMenuOpen = false" class="w-full retro-button">Стать клиентом</a>
        </div>
    </div>
</header>
