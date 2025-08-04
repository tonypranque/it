@extends('layouts.app')

@section('content')
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
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
                @foreach($services as $index => $service)
                    <a href="{{ $service->url }}" class="block">
                        <div
                            x-data="{ inView: false }"
                            x-intersect.once="inView = true"
                            :class="{ 'opacity-0 translate-y-10': !inView, 'opacity-100 translate-y-0': inView }"
                            class="retro-panel p-6 transition-all duration-700 ease-out hover:bg-primary/5 hover:shadow-md"
                            style="transition-delay: {{ $index * 100 }}ms"
                        >
                            <!-- Иконка (можно заменить на SVG) -->
                            <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                                </svg>
                            </div>

                            <!-- Заголовок -->
                            <h3 class="text-xl font-semibold text-foreground mb-2">{{ $service->title }}</h3>

                            <!-- Краткое описание -->
                            <p class="text-muted-foreground text-sm leading-relaxed">
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
                @endforeach
            </div>

            <!-- Если нет услуг -->
            @if($services->isEmpty())
                <div class="text-center py-12">
                    <p class="text-muted-foreground">Услуги пока не добавлены.</p>
                </div>
            @endif
        </div>
    </section>
@endsection
