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
    <x-services-hero :service="$service">
    </x-services-hero>


    <section class="py-20 bg-white">

        <div class="container mx-auto px-4 max-w-6xl">
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

                    <ul class="space-y-3">
                        @foreach([
                            'Анализ требований и проектирование',
                            'Разработка backend и frontend',
                            'Интеграция с внешними API',
                            'Тестирование и QA',
                            'Деплой и техническая поддержка'
                        ] as $feature)
                            <li class="flex items-start space-x-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-nc-success flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="text-foreground">{{ $feature }}</span>
                            </li>
                        @endforeach
                    </ul>
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
                                <span class="mono-font">от 2 недель</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Гарантия качества</span>
                                <span class="mono-font">12 месяцев</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Технологии</span>
                                <span class="mono-font">Laravel, React, Vue</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Поддержка</span>
                                <span class="mono-font">24/7</span>
                            </div>
                        </div>
                    </div>

                    <div class="retro-panel p-6 text-center">
                        <h3 class="font-semibold mb-2">Готов начать проект?</h3>
                        <p class="text-sm text-muted-foreground mb-4">Получи бесплатную консультацию</p>
                        <a href="{{ route('page.show', 'contacts') }}" class="retro-button inline-flex px-6 py-2 text-sm">
                            Заказать разработку
                        </a>
                    </div>
                </div>
            </div>
        </div>
        {{-- Проверяем, есть ли дочерние услуги для отображения --}}
        @if($childPages->isNotEmpty())
            <section class="py-16 bg-gray-50">
                <div class="container mx-auto px-4 max-w-6xl">
                    <div
                        x-data="{ inView: false }"
                        x-intersect.once="inView = true"
                        :class="{ 'opacity-0 translate-y-8': !inView, 'opacity-100 translate-y-0': inView }"
                        class="text-center mb-16 transition-all duration-1000 ease-out"
                    >
                        <h2 class="text-3xl md:text-4xl font-bold mb-4">
                            Специализированные <span class="text-primary">услуги</span>
                        </h2>
                        <p class="text-lg text-muted-foreground max-w-2xl mx-auto">
                            Подробнее о специализированных направлениях в рамках данной услуги.
                        </p>
                    </div>

                    <!-- Сетка дочерних услуг -->
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
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
    </section>
@endsection
