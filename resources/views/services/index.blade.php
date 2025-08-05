<!--services/index-->
@extends('layouts.app')

@section('title', 'Все IT-услуги - ' . config('app.name'))
@section('description', 'Полный список IT-услуг и решений для вашего бизнеса. Комплексное обслуживание компьютеров, сетевые решения, серверное администрирование, IT-безопасность и поддержка 1С.')

@section('meta')
    <link rel="canonical" href="{{ route('services.index') }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ route('services.index') }}">
    <meta property="og:title" content="Все IT-услуги - {{ config('app.name') }}">
    <meta property="og:description" content="Полный список IT-услуг и решений для вашего бизнеса. Комплексное обслуживание компьютеров, сетевые решения, серверное администрирование, IT-безопасность и поддержка 1С.">
    <meta property="og:image" content="{{ asset('images/og-services.jpg') }}">
    <meta property="og:site_name" content="{{ config('app.name') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ route('services.index') }}">
    <meta property="twitter:title" content="Все IT-услуги - {{ config('app.name') }}">
    <meta property="twitter:description" content="Полный список IT-услуг и решений для вашего бизнеса. Комплексное обслуживание компьютеров, сетевые решения, серверное администрирование, IT-безопасность и поддержка 1С.">
    <meta property="twitter:image" content="{{ asset('images/og-services.jpg') }}">
@endsection

@section('content')

    <section class="py-20 bg-white">


        <section class="py-16 bg-gradient-to-br from-nc-gray to-white relative overflow-hidden">
            <!-- Сетка (Subtle grid background) -->
            <div class="absolute inset-0 opacity-5">
                <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <pattern id="grid" width="20" height="20" patternUnits="userSpaceOnUse">
                            <path d="M 20 0 L 0 0 0 20" fill="none" stroke="var(--primary)" stroke-width="1"></path>
                        </pattern>
                    </defs>
                    <rect width="100%" height="100%" fill="url(#grid)" />
                </svg>
            </div>

            <!-- Основной контент -->
            <div class="container mx-auto px-4 relative z-10">
                <div
                    x-data="{ inView: false }"
                    x-intersect.once="inView = true"
                    :class="{ 'opacity-0 translate-y-8': !inView, 'opacity-100 translate-y-0': inView }"
                    class="max-w-3xl mx-auto text-center transition-all duration-1000 ease-out"
                >
                    <!-- Слот: хлебные крошки -->
                    @isset($breadcrumbs)
                        <div class="mb-4 text-left">
                            {{ $breadcrumbs }}
                        </div>
                    @endisset

                    <!-- Код-заголовок -->
                    <div class="inline-block mb-4">
                        <span class="code-highlight">// {{ $service->parent?->title ?? 'Service' }}</span>
                    </div>

                    <!-- Заголовок услуги -->
                    <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4">
                        Наши услуги
                    </h1>

                    <!-- Подзаголовок -->
                    <p class="text-lg text-muted-foreground leading-relaxed">
                        {{ $service->excerpt ?? 'Профессиональные решения для вашего бизнеса.' }}
                    </p>
                </div>
            </div>
        </section>




        <div class="container mx-auto px-4">
            <x-breadcrumbs :items="[
        ['title' => 'Главная', 'url' => route('home'), 'active' => false],
        ['title' => 'Услуги', 'url' => route('services.index'), 'active' => true]
    ]" />
            <!-- Заголовок -->
            <div
                x-data="{ inView: false }"
                x-intersect.once="inView = true"
                :class="{ 'opacity-0 translate-y-8': !inView, 'opacity-100 translate-y-0': inView }"
                class="text-center mb-16 transition-all duration-1000 ease-out"
            >
                <div class="inline-block mb-4">
                    <span class="code-highlight">// Our Services</span>
                </div>
                <h1 class="text-4xl md:text-5xl font-bold mb-4">
                    Предоставляемые  <span class="text-primary">услуги</span>
                </h1>
                <p class="text-lg text-muted-foreground max-w-2xl mx-auto">
                    Мы предлагаем полный цикл разработки и сопровождения.
                    От идеи до внедрения — всё в одном месте.
                </p>
            </div>

            <!-- Сетка услуг -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
                @forelse($services as $index => $service)
                    <div class="flex"> {{-- Добавлен flex контейнер --}}
                        <a href="{{ route('services.show.parent', $service->slug) }}" class="block group flex-1">
                            <div
                                x-data="{ inView: false }"
                                x-intersect.once="inView = true"
                                :class="{ 'opacity-0 translate-y-10': !inView, 'opacity-100 translate-y-0': inView }"
                                class="retro-panel p-6 h-full transition-all duration-700 ease-out hover:bg-primary/5 hover:shadow-md flex flex-col" {{-- Добавлены h-full и flex flex-col --}}
                                style="transition-delay: {{ $index * 100 }}ms"
                            >
                                <!-- Иконка -->
                                <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mb-4">
                                    @if($service->icon)
                                        @svg($service->icon, 'w-6 h-6 text-primary')
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                                        </svg>
                                    @endif
                                </div>

                                <!-- Заголовок -->
                                <h3 class="text-xl font-semibold text-foreground mb-2">{{ $service->title }}</h3>

                                <!-- Краткое описание -->
                                <p class="text-muted-foreground text-sm leading-relaxed flex-1">
                                    {{ $service->excerpt ?? 'Разработка, интеграция и поддержка современных IT-решений.' }}
                                </p>

                                <!-- Стрелка при наведении -->
                                <div class="flex items-center mt-4 text-primary text-sm font-medium">
                                    Подробнее
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <p class="text-muted-foreground">Услуги пока не добавлены.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
