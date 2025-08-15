<!--services/show-->
@extends('layouts.app')
@section('title', $service->title . ' - ' . config('app.name'))
@section('description', $service->excerpt ?? Str::limit(strip_tags($service->content ?? ''), 160))
@section('meta')
    <link rel="canonical" href="{{ url()->current() }}">
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $service->title }} - {{ config('app.name') }}">
    <meta property="og:description" content="{{ $service->excerpt ?? Str::limit(strip_tags($service->content ?? ''), 160) }}">
    <meta property="og:image" content="{{ asset('images/og-service.jpg') }}">
    <meta property="og:site_name" content="{{ config('app.name') }}">
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="{{ $service->title }} - {{ config('app.name') }}">
    <meta property="twitter:description" content="{{ $service->excerpt ?? Str::limit(strip_tags($service->content ?? ''), 160) }}">
    <meta property="twitter:image" content="{{ asset('images/og-service.jpg') }}">
@endsection
@section('content')
    <!-- Секция с сеткой, начинающаяся сразу после хлебных крошек -->
    <section class="relative overflow-hidden bg-gradient-to-br from-nc-gray to-white">
        <!-- Сетка (Subtle grid background) - такая же как на index -->
        <div class="absolute inset-0 opacity-5">
            <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="grid" width="100" height="50" patternUnits="userSpaceOnUse">
                        <path d="M 100 0 L 0 0 0 100" fill="none" stroke="var(--primary)" stroke-width="3"></path>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#grid)" />
            </svg>
        </div>

        <!-- Весь контент поверх сетки -->
        <div class="relative z-10">
            <div class="container mx-auto px-4">
                <div
                    x-data="{ inView: false }"
                    x-intersect.once="inView = true"
                    :class="{ 'opacity-0 translate-y-8': !inView, 'opacity-100 translate-y-0': inView }"
                    class="max-w-3xl mx-auto text-center py-16 transition-all duration-1000 ease-out"
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
                    {{ $service->title }}
                </h1>
                <!-- Подзаголовок -->
                <p class="text-lg text-muted-foreground leading-relaxed">
                    {{ $service->excerpt ?? 'Профессиональные решения для вашего бизнеса.' }}
                </p>
            </div>
        </div>


        <div class="container mx-auto px-4 pb-20">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
                <!-- Описание -->
                <div
                    x-data="{ inView: false }"
                    x-intersect.once="inView = true"
                    :class="{ 'opacity-0 -translate-x-10': !inView, 'opacity-100 translate-x-0': inView }"
                    class="space-y-6 transition-all duration-700 ease-out"
                >
                    <h2 class="text-2xl font-semibold">Что входит</h2>
                    <div class="text-muted-foreground leading-relaxed prose max-w-none">
                        {!! $service->content ?? '<p>Описание услуги будет добавлено в ближайшее время.</p>' !!}
                    </div>

                </div>
                <!-- Панель с деталями -->
                <div
                    x-data="{ inView: false }"
                    x-intersect.once="inView = true"
                    :class="{ 'opacity-0 translate-x-10': !inView, 'opacity-100 translate-x-0': inView }"
                    class="space-y-6 transition-all duration-700 ease-out delay-300"
                >
                    <div class="retro-panel p-6">
                        <h3 class="text-xl font-semibold text-primary mb-4">Почему выбирают нас</h3>
                        <div class="space-y-4 text-sm">
                            <div class="flex justify-between">
                                <span>Сроки выполнения</span>
                                <span class="mono-font">быстро и качественно</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Гарантия качества</span>
                                <span class="mono-font">на все виды работ</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Технологии</span>
                                <span class="mono-font">Современный подход, облачные технологии, </span>
                            </div>
                            <div class="flex justify-between">
                                <span>Поддержка</span>
                                <span class="mono-font">24/7</span>
                            </div>
                        </div>
                    </div>
                    <div class="retro-panel p-6 text-center">
                        <h3 class="font-semibold mb-2">Заинтересовала услуга?</h3>
                        <p class="text-sm text-muted-foreground mb-4">Получи бесплатную консультацию</p>
                        <a href="#contact" class="rounded-lg retro-button inline-flex px-6 py-2 text-sm">
                            Получить консультацию
                        </a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>


    @if($childPages->isNotEmpty())
        <section class="relative overflow-hidden bg-gradient-to-br from-nc-gray to-white">

            <div class="absolute inset-0 opacity-5">
                <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <pattern id="grid" width="100" height="50" patternUnits="userSpaceOnUse">
                            <path d="M 100 0 L 0 0 0 100" fill="none" stroke="var(--primary)" stroke-width="3"></path>
                        </pattern>
                    </defs>
                    <rect width="100%" height="100%" fill="url(#grid)" />
                </svg>
            </div>

            <div class="relative z-10 py-16">
                <div class="container mx-auto px-4 max-w-6xl">
                    <div
                        x-data="{ inView: false }"
                        x-intersect.once="inView = true"
                        :class="{ 'opacity-0 translate-y-8': !inView, 'opacity-100 translate-y-0': inView }"
                        class="text-center mb-16 transition-all duration-1000 ease-out"
                    >
                        <h2 class="text-3xl md:text-4xl font-bold mb-4">
                           Услуги в направлении<span class="text-primary"> {{ $service->title }}</span>
                        </h2>
                        <p class="text-lg text-muted-foreground max-w-2xl mx-auto">
                            Подробнее о специализированных направлениях в рамках данной услуги.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($childPages as $index => $childService)
                            <div class="flex">
                                <a href="{{ route('services.show.child', [$service->slug, $childService->slug]) }}" class="block group flex-1">
                                    <div
                                        x-data="{ inView: false }"
                                        x-intersect.once="inView = true"
                                        :class="{ 'opacity-0 translate-y-10': !inView, 'opacity-100 translate-y-0': inView }"
                                        class="retro-panel p-6 h-full transition-all duration-700 ease-out hover:bg-primary/5 hover:shadow-md flex flex-col"
                                        style="transition-delay: {{ $index * 100 }}ms"
                                    >
                                        <!-- Иконка -->
                                        <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mb-4">
                                            @if($childService->icon)
                                                @svg($childService->icon, 'w-6 h-6 text-primary')
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                                                </svg>
                                            @endif
                                        </div>
                                        <!-- Заголовок -->
                                        <h3 class="text-xl font-semibold text-foreground mb-2">{{ $childService->title }}</h3>
                                        <!-- Краткое описание -->
                                        <p class="text-muted-foreground text-sm leading-relaxed flex-1">
                                            {{ $childService->excerpt ?? 'Описание услуги будет добавлено в ближайшее время.' }}
                                        </p>

                                        <div class="flex items-center mt-4 text-primary text-sm font-medium">
                                            Подробнее
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                            </svg>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
