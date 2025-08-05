<section {{ $attributes->merge(['class' => 'py-20 bg-white']) }}>
    <div class="container mx-auto px-4">

        <!-- Заголовок -->
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">
                {!! $title !!}
            </h2>
            <p class="text-lg text-muted-foreground max-w-2xl mx-auto">
                {{ $subtitle }}
            </p>
        </div>

        <!-- Сервисы -->
        <div class="grid {{ $gridColumns() }} gap-8 mb-12">
            @forelse($services as $index => $service)
                <div
                    x-data="{ inView: false }"
                    x-intersect.once="inView = true"
                    :class="{ 'opacity-0 translate-y-10': !inView, 'opacity-100 translate-y-0': inView }"
                    class="transition-all duration-700 ease-out"
                    :style="'transition-delay: ' + {{ $index * 100 }} + 'ms'"
                >
                    <div class="retro-panel p-6 h-full hover:shadow-lg transition-all duration-300 group">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mr-4">
                                @if($service->icon)
                                    @svg($service->icon, 'w-6 h-6 text-primary')
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                    </svg>
                                @endif
                            </div>
                            @if($service->excerpt)
                                <div class="text-xs text-muted-foreground mono-font">
                                    {{ Str::limit($service->excerpt, 40) }}
                                </div>
                            @endif
                        </div>

                        <h3 class="text-xl font-semibold mb-3 group-hover:text-primary transition-colors">
                            {{ $service->title }}
                        </h3>

                        <p class="text-muted-foreground mb-4 leading-relaxed">
                            {{ $service->excerpt ?? Str::limit(strip_tags($service->content ?? ''), 120) }}
                        </p>

                        @if(Route::has('services.show.parent'))
                            <a href="{{ route('services.show.parent', $service->slug) }}"
                               class="flex items-center text-primary text-sm font-medium group-hover:translate-x-1 transition-transform">
                                <span>Подробнее</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </a>
                        @else
                            <div class="text-primary text-sm font-medium">
                                {{ $service->excerpt ?? 'Узнать больше' }}
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12">
                    <p class="text-muted-foreground">Услуги пока не добавлены</p>
                </div>
            @endforelse
        </div>

        <!-- Кнопка -->
        @if($showButton && Route::has('services.index'))
            <div class="text-center">
                <a href="{{ $buttonUrl }}"
                   class="retro-button px-6 py-3 text-lg font-medium rounded-lg inline-block">
                    {{ $buttonText }}
                </a>
            </div>
        @endif

    </div>
</section>
