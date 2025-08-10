<!-- resources/views/components/header.blade.php -->
<header class="fixed top-0 left-0 right-0 z-50 bg-white/95 backdrop-blur-md shadow-sm">
    <div class="container mx-auto px-4 py-4">
        <div class="flex items-center justify-between">
            <a href="/" class="flex items-center space-x-3">
                <div class="w-12 h-12 rounded-lg flex items-center justify-center">
                    <img src="/images/logo.jpg" alt="Logo" class="w-12 h-12 object-cover">
                </div>
                <div>
                    <h1 class="text-xl font-bold text-black">{{ config('app.name') }}</h1>
                    <p class="text-xs text-muted-foreground mono-font">ИТ решения</p>
                </div>
            </a>

            <nav class="hidden md:flex space-x-8">
                <a href="/services" class="text-foreground hover:text-primary">Услуги</a>
                <a href="#pricing" class="text-foreground hover:text-primary">Тарифы</a>
                <a href="/#about" class="text-foreground hover:text-primary">О нас</a>
                <a href="/#portfolio" class="text-foreground hover:text-primary">Клиенты</a>
                <a href="/#contact" class="text-foreground hover:text-primary">Контакты</a>
            </nav>

            <div class="flex items-center space-x-4">
                <a href="tel:{{ site_setting('phone') }}" class="hidden md:inline-flex items-center justify-center px-4 py-2 rounded-lg cursor-pointer space-x-2">
                    <svg width="32" height="32" viewBox="0 0 1024 1024" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M256 853.333V213.333h426.667c46.933 0 85.333 38.4 85.333 85.334v554.666c0 46.934-38.4 85.334-85.333 85.334H341.333c-46.933 0-85.333-38.4-85.333-85.334z" fill="#212529"/>
                        <path d="M682.667 277.333H341.333c-12.8 0-21.333 8.534-21.333 21.334v170.666c0 12.8 8.533 21.334 21.333 21.334h341.334c12.8 0 21.333-8.534 21.333-21.334v-170.666c0-12.8-8.533-21.333-21.333-21.333z" fill="#f8f9fa"/>
                        <path d="M405.333 640h-42.666c-12.8 0-21.334-8.533-21.334-21.333v-21.333c0-12.8 8.534-21.334 21.334-21.334h42.666c12.8 0 21.333 8.534 21.333 21.334v21.333c0 12.8-8.533 21.333-21.333 21.333zm128 0h-42.666c-12.8 0-21.334-8.533-21.334-21.333v-21.333c0-12.8 8.534-21.334 21.334-21.334h42.666c12.8 0 21.333 8.534 21.333 21.334v21.333c0 12.8-8.533 21.333-21.333 21.333zm128 0h-42.666c-12.8 0-21.334-8.533-21.334-21.333v-21.333c0-12.8 8.534-21.334 21.334-21.334h42.666c12.8 0 21.333 8.534 21.333 21.334v21.333c0 12.8-8.533 21.333-21.333 21.333zM405.333 746.667h-42.666c-12.8 0-21.334-8.534-21.334-21.334v-21.333c0-12.8 8.534-21.333 21.334-21.333h42.666c12.8 0 21.333 8.533 21.333 21.333v21.333c0 12.8-8.533 21.334-21.333 21.334zm128 0h-42.666c-12.8 0-21.334-8.533-21.334-21.333v-21.333c0-12.8 8.534-21.334 21.334-21.334h42.666c12.8 0 21.333 8.533 21.333 21.334v21.333c0 12.8-8.533 21.334-21.333 21.334zm128 0h-42.666c-12.8 0-21.334-8.533-21.334-21.333v-21.333c0-12.8 8.534-21.334 21.334-21.334h42.666c12.8 0 21.333 8.533 21.333 21.334v21.333c0 12.8-8.533 21.334-21.333 21.334zM405.333 853.333h-42.666c-12.8 0-21.334-8.533-21.334-21.333v-21.333c0-12.8 8.534-21.334 21.334-21.334h42.666c12.8 0 21.333 8.533 21.333 21.334v21.333c0 12.8-8.533 21.333-21.333 21.333zm128 0h-42.666c-12.8 0-21.334-8.533-21.334-21.333v-21.333c0-12.8 8.534-21.334 21.334-21.334h42.666c12.8 0 21.333 8.533 21.333 21.334v21.333c0 12.8-8.533 21.333-21.333 21.333zm128 0h-42.666c-12.8 0-21.334-8.533-21.334-21.333v-21.333c0-12.8 8.534-21.334 21.334-21.334h42.666c12.8 0 21.333 8.533 21.333 21.334v21.333c0 12.8-8.533 21.334-21.333 21.334z" fill="#d7ebf6"/>
                        <path d="M341.333 213.333h-85.333V85.333c0-23.466 19.2-42.666 42.667-42.666s42.667 19.2 42.666 42.666v128z" fill="#0d49a2"/>
                    </svg>
                    <span>{{ site_setting('phone') }}</span>
                </a>
                <button class="hidden md:inline-flex retro-button px-4 py-2 rounded-lg cursor-pointer">Стать клиентом</button>
                <button data-menu-toggle class="md:hidden p-2" aria-label="Toggle menu">
                    <svg class="w-6 h-6 menu-icon-open" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                    <svg class="w-6 h-6 menu-icon-close hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        {{-- Хлебные крошки интегрированы в хедер --}}
        @if(isset($breadcrumbItems) && !empty($breadcrumbItems))
            <div class="border-t border-border">
                <div class="container mx-auto px-4 py-3">
                    <nav aria-label="Breadcrumb">
                        <ol class="flex flex-wrap items-center gap-x-2 text-sm text-muted-foreground">
                            <li>
                                <a href="{{ url('/') }}" class="flex items-center space-x-1 text-muted-foreground hover:text-primary transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                    <span>Home</span>
                                </a>
                            </li>

                            @foreach($breadcrumbItems as $index => $item)
                                <li class="flex items-center" aria-hidden="true">
                                    <svg class="w-4 h-4 mx-1 text-muted-foreground" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M9 18l6-6-6-6" stroke="currentColor" stroke-width="2" fill="none" />
                                    </svg>
                                </li>
                                <li>
                                    @if(!($item['active'] ?? false) && isset($item['url']))
                                        <a href="{{ $item['url'] }}" class="text-muted-foreground hover:text-primary transition-colors">
                                            {{ $item['title'] }}
                                        </a>
                                    @else
                                        <span class="text-foreground font-medium">{{ $item['title'] }}</span>
                                    @endif
                                </li>
                            @endforeach
                        </ol>
                    </nav>
                </div>
            </div>
        @endif
    </div>
</header>

<!-- Мобильное меню вынесено за пределы хедера -->
<div class="mobile-menu-container md:hidden fixed inset-0 z-50 hidden opacity-0">
    <!-- Подложка (backdrop) -->
    <div class="mobile-menu-backdrop fixed inset-0 bg-black/50 backdrop-blur-sm opacity-0 transition-opacity duration-300"></div>

    <!-- Контент меню -->
    <div class="mobile-menu-content relative bg-white h-full w-4/5 max-w-sm ml-auto py-6 px-4 overflow-y-auto translate-x-full transition-transform duration-300">
        <div class="space-y-4">
            <a href="/services" class="block py-2 text-lg font-medium mobile-menu-link">Услуги</a>
            <a href="/#pricing" class="block py-2 text-lg font-medium mobile-menu-link">Тарифы</a>
            <a href="/#about" class="block py-2 text-lg font-medium mobile-menu-link">О нас</a>
            <a href="/#portfolio" class="block py-2 text-lg font-medium mobile-menu-link">Клиенты</a>
            <a href="/#contact" class="block py-2 text-lg font-medium mobile-menu-link">Контакты</a>
            <a href="tel:{{ site_setting('phone') }}" class="w-full retro-button py-3 text-center mt-4 block mobile-menu-link">{{ site_setting('phone') }}</a>
        </div>
    </div>
</div>
