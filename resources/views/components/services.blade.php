<section id="services" class="py-20 bg-white">
    <div class="container mx-auto px-4">

        <!-- Заголовок с анимацией -->
        <div
            x-data="{ inView: false }"
            x-intersect="inView = true"
            :class="{ 'opacity-0 translate-y-8': !inView, 'opacity-100 translate-y-0': inView }"
            class="text-center mb-16 transition-all duration-1000 ease-out"
        >
            <div class="inline-block mb-4">
                <span class="code-highlight">const itSupport = [</span>
            </div>
            <h2 class="text-3xl md:text-4xl font-bold mb-4">
                Наши <span class="text-primary">IT-услуги</span>
            </h2>
            <p class="text-lg text-muted-foreground max-w-2xl mx-auto mb-4">
                Надежные решения для поддержки и администрирования вашей IT-инфраструктуры, обеспечивающие стабильность бизнеса.
            </p>
            <div class="inline-block">
                <span class="code-highlight">];</span>
            </div>
        </div>

        <!-- Сервисы -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
            @foreach([
              [
                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17V7m0 10h6m-6 0H3m6 0v4m6-18v14m0 0H9m6 0h6m-6 0v4"/>',
                'title' => 'IT-аутсорсинг и поддержка',
                'description' => 'Комплексное обслуживание компьютеров, оргтехники и программного обеспечения для вашего бизнеса.',
                'technologies' => ['Windows', 'macOS', 'Office 365', 'Helpdesk'],
                'deliveryTime' => '1-3 дня'
              ],
              [
                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7-7v14m-9-9h18"/>',
                'title' => 'Сетевые решения',
                'description' => 'Создание и администрирование IT-инфраструктуры, настройка сетей и IP-телефонии.',
                'technologies' => ['Cisco', 'Mikrotik', 'Wi-Fi 6', 'VoIP'],
                'deliveryTime' => '2-7 дней'
              ],
              [
                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7-7v14m-9-9h18"/>',
                'title' => 'Серверное администрирование',
                'description' => 'Настройка, обслуживание и поддержка серверов, включая решения для 1С.',
                'technologies' => ['Windows Server', 'Linux', 'VMware', '1С Сервер'],
                'deliveryTime' => '2-10 дней'
              ],
              [
                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.165-2.052-.48-3.016z"/>',
                'title' => 'IT-безопасность и восстановление',
                'description' => 'Аудит, антивирусная защита, резервное копирование и восстановление данных.',
                'technologies' => ['Kaspersky', 'Veeam', 'CCTV', 'Firewall'],
                'deliveryTime' => '1-5 дней'
              ],
              [
                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>',
                'title' => '1С: Поддержка и внедрение',
                'description' => 'Внедрение, обновление и сопровождение решений 1С для оптимизации бизнес-процессов.',
                'technologies' => ['1С:Бухгалтерия', '1С:Предприятие', '1С:ИТС', '1С:Фреш'],
                'deliveryTime' => '3-14 дней'
              ],
            ] as $index => $service)
                <div
                    x-data="{ inView: false }"
                    x-intersect="inView = true"
                    :class="{ 'opacity-0 translate-y-10': !inView, 'opacity-100 translate-y-0': inView }"
                    class="transition-all duration-700 ease-out"
                    :style="'transition-delay: {{ $index * 100 }}ms'"
                >
                    <div class="retro-panel p-6 h-full hover:shadow-lg transition-all duration-300 group">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    {!! $service['icon'] !!}
                                </svg>
                            </div>
                            <div class="text-xs text-muted-foreground mono-font">
                                Срок: {{ $service['deliveryTime'] }}
                            </div>
                        </div>

                        <h3 class="text-xl font-semibold mb-3 group-hover:text-primary transition-colors">
                            {{ $service['title'] }}
                        </h3>

                        <p class="text-muted-foreground mb-4 leading-relaxed">
                            {{ $service['description'] }}
                        </p>

                        <div class="mb-4">
                            <div class="text-xs text-muted-foreground mb-2 mono-font">Технологии:</div>
                            <div class="flex flex-wrap gap-2">
                                @foreach($service['technologies'] as $tech)
                                    <span class="text-xs bg-primary/10 text-primary px-2 py-1 rounded mono-font">
                                        {{ $tech }}
                                    </span>
                                @endforeach
                            </div>
                        </div>

                        <div class="flex items-center text-primary text-sm font-medium group-hover:translate-x-1 transition-transform cursor-pointer">
                            <span>Узнать больше</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Кнопка -->
        <div
            x-data="{ inView: false }"
            x-intersect="inView = true"
            :class="{ 'opacity-0 translate-y-8': !inView, 'opacity-100 translate-y-0': inView }"
            class="text-center transition-all duration-1000 ease-out"
            style="transition-delay: 300ms"
        >
            <button class="retro-button px-6 py-3 text-lg font-medium rounded-lg cursor-pointer">
                Все услуги
            </button>
        </div>

    </div>
</section>
