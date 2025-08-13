@extends('layouts.app')

@section('title', $page->title . ' - ' . config('app.name'))
@section('description', $page->excerpt ?? Str::limit(strip_tags($page->content ?? ''), 160))

@section('meta')
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $page->title }} - {{ config('app.name') }}">
    <meta property="og:description" content="{{ $page->excerpt ?? Str::limit(strip_tags($page->content ?? ''), 160) }}">
    <meta property="og:image" content="{{ asset('images/og-page.jpg') }}">
    <meta property="og:site_name" content="{{ config('app.name') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="{{ $page->title }} - {{ config('app.name') }}">
    <meta property="twitter:description" content="{{ $page->excerpt ?? Str::limit(strip_tags($page->content ?? ''), 160) }}">
    <meta property="twitter:image" content="{{ asset('images/og-page.jpg') }}">

    <!-- Schema.org JSON-LD -->
    <script type="application/ld+json">
        {!! $schema !!}
    </script>
@endsection

@section('content')
    <!-- Единая секция с фоном, сеткой и контентом -->
    <section class="relative overflow-hidden bg-gradient-to-br from-nc-gray to-white">
        <!-- Сетка (Subtle grid background) -->
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
                <!-- Заголовок с анимацией -->
                <div
                    x-data="{ inView: false }"
                    x-intersect.once="inView = true"
                    :class="{ 'opacity-0 translate-y-8': !inView, 'opacity-100 translate-y-0': inView }"
                    class="max-w-3xl mx-auto text-center py-16 transition-all duration-1000 ease-out"
                >
                    <!-- Код-заголовок -->
                    <div class="inline-block mb-4">
                        <span class="code-highlight">// {{ $page->parent?->title ?? 'Page' }}</span>
                    </div>
                    <!-- Заголовок страницы -->
                    <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4">
                        {{ $page->title }}
                    </h1>
                {{--    <!-- Подзаголовок -->
                    <p class="text-lg text-muted-foreground leading-relaxed">
                        {{ $page->excerpt ?? 'Подробная информация о наших услугах и компании.' }}
                    </p>--}}
                </div>

                <!-- Основной контент -->
                <div class="pb-20">
                    <div
                        x-data="{ inView: false }"
                        x-intersect.once="inView = true"
                        :class="{ 'opacity-0 translate-y-8': !inView, 'opacity-100 translate-y-0': inView }"
                        class="max-w-none text-muted-foreground leading-relaxed prose prose-gray transition-all duration-1000 ease-out"
                    >
                        {!! $page->content !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Подстраницы (если есть) --}}
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
                            Подразделы в категории <span class="text-primary">{{ $page->title }}</span>
                        </h2>
                        <p class="text-lg text-muted-foreground max-w-2xl mx-auto">
                            Подробнее о специализированных услугах и решениях.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($childPages as $index => $childPage)
                            <div class="flex">
                                <a href="{{ url($page->slug . '/' . $childPage->slug) }}" class="block group flex-1">
                                    <div
                                        x-data="{ inView: false }"
                                        x-intersect.once="inView = true"
                                        :class="{ 'opacity-0 translate-y-10': !inView, 'opacity-100 translate-y-0': inView }"
                                        class="retro-panel p-6 h-full transition-all duration-700 ease-out hover:bg-primary/5 hover:shadow-md flex flex-col"
                                        style="transition-delay: {{ $index * 100 }}ms"
                                    >
                                        <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mb-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </div>
                                        <h3 class="text-xl font-semibold text-foreground mb-2">{{ $childPage->title }}</h3>
                                        <p class="text-muted-foreground text-sm leading-relaxed flex-1">
                                            {{ $childPage->excerpt ?? 'Подробнее о направлении.' }}
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
