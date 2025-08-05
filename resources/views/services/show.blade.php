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
            <x-breadcrumbs :items="[
            ['title' => 'Главная', 'url' => route('home'), 'active' => false],
            ['title' => 'Услуги', 'url' => route('services.index'), 'active' => false],
            ['title' => $service->parent?->title, 'url' => $service->parent ? route('services.show.parent', $service->parent->slug) : null, 'active' => false],
            ['title' => $service->title, 'active' => true]
        ]" />
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
    </section>
@endsection
