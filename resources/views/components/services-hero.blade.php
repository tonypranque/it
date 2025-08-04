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
                {{ $service->title }}
            </h1>

            <!-- Подзаголовок -->
            <p class="text-lg text-muted-foreground leading-relaxed">
                {{ $service->excerpt ?? 'Профессиональные решения для вашего бизнеса.' }}
            </p>
        </div>
    </div>
</section>
