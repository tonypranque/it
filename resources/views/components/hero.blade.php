<section class="min-h-screen flex items-center justify-center relative overflow-hidden pt-20 bg-gradient-to-br from-nc-gray to-white">
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

    <!-- Основной контент -->
    <div class="container mx-auto px-4 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Левая часть: Текст и кнопки -->
            <div
                x-data="{ inView: false }"
                x-intersect.once="inView = true"
                :class="{ 'opacity-0 -translate-x-5': !inView, 'opacity-100 translate-x-0': inView }"
                class="space-y-8 transition-all duration-700 ease-out"
            >
                <div class="space-y-4">
                    <!-- Код: function outsource() { -->
                    <div
                        x-data="{ inView: false }"
                        x-intersect.once="inView = true"
                        :class="{ 'opacity-0 translate-y-2': !inView, 'opacity-100 translate-y-0': inView }"
                        class="inline-block transition-all duration-500 delay-200"
                    >
                        <span class="code-highlight">function outsource() {</span>
                    </div>

                    <!-- Заголовок -->
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight">
                        Качественные IT
                        <br />
                        <span class="text-primary">Услуги</span>
                        <br />
                        <span class="text-muted-foreground text-3xl md:text-4xl">и техподдержка</span>
                    </h1>

                    <!-- Код: return "success"; -->
                    <div
                        x-data="{ inView: false }"
                        x-intersect.once="inView = true"
                        :class="{ 'opacity-0 translate-y-2': !inView, 'opacity-100 translate-y-0': inView }"
                        class="transition-all duration-500 delay-400"
                    >
                        <span class="code-highlight">return "success"; }</span>
                    </div>
                </div>

                <!-- Описание -->
                <p
                    x-data="{ inView: false }"
                    x-intersect.once="inView = true"
                    :class="{ 'opacity-0 translate-y-2': !inView, 'opacity-100 translate-y-0': inView }"
                    class="text-lg text-muted-foreground leading-relaxed max-w-xl transition-all duration-500 delay-600"
                >
                    Дайте новый импульс вашему бизнесу с современными IT-решениями! Мы предлагаем профессиональное системное администрирование, надежную техническую поддержку и гибкую IT-инфраструктуру, которые приносят реальную пользу.
                </p>

                <!-- Кнопки -->
                <div
                    x-data="{ inView: false }"
                    x-intersect.once="inView = true"
                    :class="{ 'opacity-0 translate-y-2': !inView, 'opacity-100 translate-y-0': inView }"
                    class="flex flex-col sm:flex-row gap-4 transition-all duration-500 delay-800"
                >
                    <a href="#contact" class="retro-button px-6 py-3 text-lg font-medium group rounded-lg">
                        Получить IT-Поддержку
                        <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 w-4 h-4 inline transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                    <a href="#portfolio" class="inline-flex justify-center px-6 py-3 text-lg font-medium border border-primary text-primary hover:bg-primary hover:text-white rounded-lg transition-colors">
                        Наши клиенты
                    </a>
                </div>

                <!-- Индикаторы доверия -->
                <div
                    x-data="{ inView: false }"
                    x-intersect.once="inView = true"
                    :class="{ 'opacity-0 translate-y-2': !inView, 'opacity-100 translate-y-0': inView }"
                    class="flex items-center space-x-6 pt-4 transition-all duration-500 delay-1000"
                >
                    <div class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-nc-success" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="text-sm text-muted-foreground">Скорость реакции 15 минут</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-nc-success" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="text-sm text-muted-foreground">24/7 Поддержка</span>
                    </div>
                </div>
            </div>

            <!-- Правая часть: Панель статистики -->
            <div
                x-data="{ inView: false }"
                x-intersect.once="inView = true"
                :class="{ 'opacity-0 translate-x-5': !inView, 'opacity-100 translate-x-0': inView }"
                class="transition-all duration-700 ease-out delay-300"
            >
                <div class="retro-panel p-8 space-y-6">
                    <div class="text-center pb-4 border-b border-border">
                        <h3 class="text-lg font-semibold text-primary mb-2">Производственные метрики</h3>
                        <p class="text-sm text-muted-foreground mono-font">Последнее обновление: {{ now()->format('Y-m-d') }}</p>
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-primary mono-font">500+</div>
                            <div class="text-sm text-muted-foreground">Реализованных проектов</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-accent mono-font">98%</div>
                            <div class="text-sm text-muted-foreground">Довольных клиентов</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-nc-cyan mono-font">15+</div>
                            <div class="text-sm text-muted-foreground">Лет опыта</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-nc-success mono-font">24/7</div>
                            <div class="text-sm text-muted-foreground">Продвинутая поддержка</div>
                        </div>
                    </div>

                    <div class="pt-4 border-t border-border">
                        <div class="text-xs text-muted-foreground mono-font text-center">
                            Status: <span class="text-nc-success">ONLINE</span> |
                            Uptime: <span class="text-primary">99.9%</span>
                        </div>
                    </div>
                </div>

                <!-- Декоративные элементы кода -->
                <div class="absolute -top-4 -right-4 bg-primary text-white p-2 rounded text-xs mono-font opacity-80 pointer-events-none">
                    {{"<"}}dev{{">"}}
                </div>
                <div class="absolute -bottom-4 -left-4 bg-accent text-accent-foreground p-2 rounded text-xs mono-font opacity-80 pointer-events-none">
                    {"{status: 'ready'}"}
                </div>
            </div>
        </div>
    </div>
</section>
