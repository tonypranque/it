<section id="pricing" class="py-20 bg-nc-gray">
    <div class="container mx-auto px-4">
        <!-- Заголовок -->
        <div
            x-data="{ inView: false }"
            x-intersect.once="inView = true"
            :class="{ 'opacity-0 translate-y-8': !inView, 'opacity-100 translate-y-0': inView }"
            class="text-center mb-16 transition-all duration-1000 ease-out"
        >
            <div class="inline-block mb-4">
                <span class="code-highlight">const pricingPlans = {</span>
            </div>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-6">
                Простое, <span class="text-primary">прозрачное</span> ценообразование
            </h2>
            <p class="text-lg text-muted-foreground max-w-3xl mx-auto mb-4">
                Выберите подходящий план для вашего бизнеса. Все тарифы включают качество, безопасность и поддержку 24/7.
            </p>
            <div class="inline-block">
                <span class="code-highlight">}</span>
            </div>
            <h2 class="text-2xl md:text-3xl font-semibold text-center my-5 sm:px-5">
                Тарифы на IT-поддержку
            </h2>
        </div>

        <!-- Сетка тарифов -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-7xl mx-auto mt-3">
            @foreach([
                [
                    'id' => 'basic',
                    'name' => 'Базовый',
                    'description' => 'Для небольших офисов и стартов',
                    'price' => 'от 3 900',
                    'period' => '₽/мес',
                    'popular' => false,
                    'features' => [
                        'Аварийные выезды: 2',
                        'Удалённые подключения: без ограничений',
                        'Service Desk: включено',
                        'Консультации: по запросу',
                        'Поддержка ПО и ОС: включена',
                        'Обновления ПО: по запросу',
                        'Резервное копирование: по запросу',
                        'IP-телефония: 3000 ₽',
                        'АРМ: от 900 ₽',
                        'Сервер: 2000 ₽',
                    ],
                    'technologies' => ['Windows', 'Office 365', 'IP-телефония'],
                ],
                [
                    'id' => 'standard',
                    'name' => 'Стандарт',
                    'description' => 'Оптимальный выбор для среднего бизнеса',
                    'price' => 'от 8 300',
                    'period' => '₽/мес',
                    'popular' => true,
                    'features' => [
                        'Плановые выезды: 1',
                        'Аварийные выезды: 2',
                        'Удалённые подключения: без ограничений',
                        'Service Desk: включено',
                        'Консультации: включены',
                        'Подбор оборудования: включён',
                        'Ремонт: включён',
                        'Поддержка ПО и ОС: включена',
                        'Обновления ПО: включены',
                        'Политики доступа: по запросу',
                        'Резервное копирование: по запросу',
                        'IP-телефония: 3000 ₽',
                        'АРМ: от 1400 ₽',
                        'Сервер: 2000 ₽',
                    ],
                    'technologies' => ['Windows', 'Linux', 'Active Directory', 'IP-телефония', 'Backup'],
                ],
                [
                    'id' => 'premium',
                    'name' => 'Премиум',
                    'description' => 'Полный цикл IT-сопровождения для бизнеса',
                    'price' => 'от 12 200',
                    'period' => '₽/мес',
                    'popular' => false,
                    'features' => [
                        'Плановые выезды: 4',
                        'Аварийные выезды: 4',
                        'Удалённые подключения: без ограничений',
                        'Service Desk: включено',
                        'Консультации: включены',
                        'Подбор оборудования: включён',
                        'Ремонт: только работы',
                        'Поддержка ПО и ОС: включена',
                        'Обновления ПО: включены',
                        'Политики доступа: включены',
                        'Резервное копирование: включено',
                        'IP-телефония: 3000 ₽',
                        'АРМ: от 1900 ₽',
                        'Сервер: 2000 ₽',
                    ],
                    'technologies' => ['Windows', 'Linux', 'Active Directory', 'IP-телефония', 'Backup', 'Docker', 'SVN'],
                ]
            ] as $index => $plan)
                <div
                    x-data="{ inView: false }"
                    x-intersect.once="inView = true"
                    :class="{ 'opacity-0 translate-y-10': !inView, 'opacity-100 translate-y-0': inView }"
                    class="relative transition-all duration-700 ease-out"
                    style="transition-delay: {{ $index * 100 }}ms"
                >
                    <!-- Метка "Популярно" -->
                    @if($plan['popular'])
                        <div class="absolute -top-4 left-1/2 transform -translate-x-1/2 z-10">
                            <span class="bg-primary text-white px-4 py-1 text-sm rounded-full font-medium flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                                Самый популярный
                            </span>
                        </div>
                    @endif

                    <!-- Карточка тарифа -->
                    <div class="{{ $plan['popular'] ? 'border-primary shadow-lg retro-panel scale-105' : 'border-border hover:border-primary/20' }} rounded-lg p-6 h-full bg-white transition-all duration-300 hover:shadow-xl">
                        <div class="text-center pb-8">
                            <h3 class="text-2xl font-bold mb-2">{{ $plan['name'] }}</h3>
                            <p class="text-sm text-muted-foreground mb-6">{{ $plan['description'] }}</p>

                            <!-- Цена -->
                            <div class="mb-6">
                                <span class="text-4xl font-bold text-primary mono-font">{{ $plan['price'] }}</span>
                                <span class="text-muted-foreground text-sm">{{ $plan['period'] }}</span>
                            </div>

                            <!-- Технологии -->
                            <div class="mb-4">
                                <div class="text-xs text-muted-foreground mb-2 mono-font">Технологии:</div>
                                <div class="flex flex-wrap gap-1 justify-center">
                                    @foreach($plan['technologies'] as $tech)
                                        <span class="bg-secondary text-secondary-foreground text-xs px-2 py-1 rounded">{{ $tech }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Фичи -->
                        <div class="space-y-3">
                            @foreach($plan['features'] as $feature)
                                <div class="flex items-start space-x-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-nc-success flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="text-sm text-foreground">{{ $feature }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Блок с кастомным предложением -->
        <div
            x-data="{ inView: false }"
            x-intersect.once="inView = true"
            :class="{ 'opacity-0 translate-y-8': !inView, 'opacity-100 translate-y-0': inView }"
            class="text-center mt-16 transition-all duration-1000 ease-out delay-400"
        >
            <div class="retro-panel p-8 max-w-2xl mx-auto">
                <h3 class="text-xl font-semibold mb-4">Нужна точная стоимость?</h3>
                <p class="text-muted-foreground mb-6">
                    Укажите количество рабочих мест, серверов и другие параметры — мы рассчитаем стоимость под вашу инфраструктуру.
                </p>
                <button
                    onclick="document.getElementById('contact').scrollIntoView({ behavior: 'smooth' });"
                    class="retro-button inline-flex px-6 py-3 text-lg font-medium"
                >
                    Получить расчёт
                </button>
            </div>
        </div>
    </div>
</section>
