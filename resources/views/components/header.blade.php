<!-- resources/views/components/header.blade.php -->
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
                <div class="w-12 h-12 rounded-lg flex items-center justify-center">
                    <img src="/images/logo.jpg" alt="Logo" class="w-12 h-12">
                    <span class="mono-font text-white text-sm font-semibold"></span>
                </div>
                <div>
                    <h1 class="text-xl font-bold text-black">{{ config('app.name') }}</h1>
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
                <button @click="isMobileMenuOpen = !isMobileMenuOpen" class="md:hidden p-2" aria-label="Toggle menu">
                    <svg x-show="!isMobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                    <svg x-show="isMobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Мобильное меню с подложкой -->
        <div
            x-show="isMobileMenuOpen"
            x-cloak
            class="md:hidden fixed inset-0 z-50"
        >
            <!-- Подложка (backdrop) -->
            <div
                class="fixed inset-0 bg-black/50 backdrop-blur-sm"
                @click="isMobileMenuOpen = false"
                aria-hidden="true"
            ></div>

            <!-- Контент меню -->
            <div
                class="relative bg-white h-full w-4/5 max-w-sm ml-auto py-6 px-4 overflow-y-auto"
                @click.outside="isMobileMenuOpen = false"
                x-trap.noscroll="isMobileMenuOpen"
            >
                <div class="space-y-4">
                    <a href="/services" @click="isMobileMenuOpen = false" class="block py-2 text-lg font-medium">Услуги</a>
                    <a href="/#about" @click="isMobileMenuOpen = false" class="block py-2 text-lg font-medium">О нас</a>
                    <a href="/#portfolio" @click="isMobileMenuOpen = false" class="block py-2 text-lg font-medium">Клиенты</a>
                    <a href="/#contact" @click="isMobileMenuOpen = false" class="block py-2 text-lg font-medium">Контакты</a>
                    <a href="/#contact" @click="isMobileMenuOpen = false" class="w-full retro-button py-3 text-center mt-4">Стать клиентом</a>
                </div>
            </div>
        </div>
    </div>

    {{-- Хлебные крошки интегрированы в хедер --}}
    @if(isset($breadcrumbItems) && !empty($breadcrumbItems))
        <div class="border-t border-border"> {{-- Добавляем разделительную линию --}}
            <div class="container mx-auto px-4 py-3"> {{-- Уменьшаем отступы --}}
                <nav aria-label="Breadcrumb">
                    <ol class="flex flex-wrap items-center gap-x-2 text-sm text-muted-foreground">
                        {{-- Добавляем домашнюю ссылку --}}
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
</header>
