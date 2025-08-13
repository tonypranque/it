<section id="about" class="py-20 bg-nc-gray">
    <div class="container mx-auto px-4 mt-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

            <!-- Левая часть: О компании -->
            <div
                x-data="{ inView: false }"
                x-intersect.once="inView = true"
                :class="{ 'opacity-0 -translate-x-10': !inView, 'opacity-100 translate-x-0': inView }"
                class="transition-all duration-700 ease-out"
            >
                <div class="mb-6">
                    <span class="code-highlight mb-4 inline-block">// О нас</span>
                    <h2 class="text-3xl md:text-4xl font-bold mb-4">
                        Почему выбирают <span class="text-primary">нас</span>?
                    </h2>
                    <p class="text-lg text-muted-foreground leading-relaxed">
                        Мы — ваш надежный партнер в IT-поддержке и администрировании, обеспечивающий стабильность и безопасность вашей IT-инфраструктуры с 2009 года.
                    </p>
                </div>

                <!-- Преимущества -->
                <div class="space-y-4 mb-8">
                    @foreach([
                      'Системные администраторы с опытом более 10 лет',
                      'Круглосуточная техническая поддержка',
                      'Прозрачное взаимодействие и отчетность',
                      'Быстрое реагирование на инциденты',
                      'Гарантия стабильности IT-инфраструктуры',
                      'Долгосрочное сопровождение и обслуживание'
                    ] as $index => $highlight)
                        <div
                            x-data="{ inView: false }"
                            x-intersect.once="inView = true"
                            :class="{ 'opacity-0 -translate-x-5': !inView, 'opacity-100 translate-x-0': inView }"
                            class="flex items-center space-x-3 transition-all duration-500 ease-out"
                            :class="'delay-' + ($index * 100)"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-nc-success flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-foreground">{{ $highlight }}</span>
                        </div>
                    @endforeach
                </div>

                <!-- Сертификаты -->
                <div class="grid grid-cols-2 gap-4">
                    @foreach([
                      ['name' => 'ISO 27001', 'type' => 'Информационная безопасность'],
                      ['name' => 'ITIL v4', 'type' => 'Управление IT-услугами'],
                      ['name' => 'Kaspersky Certified', 'type' => 'Антивирусная защита'],
                      ['name' => '1С:Профессионал', 'type' => 'Внедрение 1С']
                    ] as $index => $cert)
                        <div
                            x-data="{ inView: false }"
                            x-intersect.once="inView = true"
                            :class="{ 'opacity-0 translate-y-5': !inView, 'opacity-100 translate-y-0': inView }"
                            class="retro-panel p-4 text-center transition-all duration-500 ease-out"
                            :class="'delay-' + (600 + $index * 100)"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-primary mx-auto mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.165-2.052-.48-3.016z" />
                            </svg>
                            <div class="font-semibold text-sm">{{ $cert['name'] }}</div>
                            <div class="text-xs text-muted-foreground">{{ $cert['type'] }}</div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Правая часть: Статистика и процесс -->
            <div
                x-data="{ inView: false }"
                x-intersect.once="inView = true"
                :class="{ 'opacity-0 translate-x-10': !inView, 'opacity-100 translate-x-0': inView }"
                class="space-y-6 transition-all duration-700 ease-out"
            >
                <!-- Статистика компании -->
                <div class="retro-panel p-8">
                    <div class="text-center mb-6">
                        <h3 class="text-xl font-semibold text-primary mb-2">О компании</h3>
                        <p class="text-sm text-muted-foreground mono-font">Работаем с 2009 года</p>
                    </div>
                    <div class="grid grid-cols-2 gap-6 mb-6">
                        <!-- Команда -->
                        <div class="text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-primary mx-auto mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            <div class="text-2xl font-bold text-foreground mono-font">15+ лет</div>
                            <div class="text-sm text-muted-foreground">Опытные специалисты</div>
                        </div>
                        <!-- Клиенты -->
                        <div class="text-center">
                            <svg class="w-8 h-8 text-accent mx-auto mb-2" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>smile</title> <desc>Created with sketchtool.</desc> <g id="people" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="smile" fill="#e6bb18"> <path d="M12,22 C6.4771525,22 2,17.5228475 2,12 C2,6.4771525 6.4771525,2 12,2 C17.5228475,2 22,6.4771525 22,12 C22,17.5228475 17.5228475,22 12,22 Z M16,13 C16,15.209139 14.209139,17 12,17 C9.790861,17 8,15.209139 8,13 L16,13 Z M12,20 C16.418278,20 20,16.418278 20,12 C20,7.581722 16.418278,4 12,4 C7.581722,4 4,7.581722 4,12 C4,16.418278 7.581722,20 12,20 Z M9.5,11 C10.3284271,11 11,10.3284271 11,9.5 C11,8.67157288 10.3284271,8 9.5,8 C8.67157288,8 8,8.67157288 8,9.5 C8,10.3284271 8.67157288,11 9.5,11 Z M14.5,11 C15.3284271,11 16,10.3284271 16,9.5 C16,8.67157288 15.3284271,8 14.5,8 C13.6715729,8 13,8.67157288 13,9.5 C13,10.3284271 13.6715729,11 14.5,11 Z" id="Shape"> </path> </g> </g> </g></svg>
                            <div class="text-2xl font-bold text-foreground mono-font">300+</div>
                            <div class="text-sm text-muted-foreground">Довольных клиентов</div>
                        </div>
                        <!-- Успешные задачи -->
                        <div class="text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-nc-success mx-auto mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.165-2.052-.48-3.016z" />
                            </svg>
                            <div class="text-2xl font-bold text-foreground mono-font">95%</div>
                            <div class="text-sm text-muted-foreground">Успешных задач</div>
                        </div>
                        <!-- Время ответа -->
                        <div class="text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-nc-cyan mx-auto mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div class="text-2xl font-bold text-foreground mono-font">15 минут</div>
                            <div class="text-sm text-muted-foreground">Среднее время ответа</div>
                        </div>
                    </div>
                    <div class="border-t border-gray-700 pt-4">
                        <div class="text-center">
                            <div class="text-xs text-muted-foreground mono-font">
                                <span class="text-nc-success">●</span> Статус: ОТЛИЧНЫЙ
                            </div>
                            <div class="text-xs text-muted-foreground mono-font mt-1">
                                География: Россия • СНГ
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Процесс предоставления услуг -->
                <div class="retro-panel p-6">
                    <h4 class="font-semibold mb-4 text-primary">Наш процесс работы</h4>
                    <div class="space-y-3 text-sm">
                        <div class="flex items-center space-x-3">
                            <span class="w-6 h-6 bg-primary text-white rounded-full flex items-center justify-center text-xs font-bold">1</span>
                            <span>Анализ потребностей и аудит</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <span class="w-6 h-6 bg-primary text-white rounded-full flex items-center justify-center text-xs font-bold">2</span>
                            <span>Планирование и настройка решений</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <span class="w-6 h-6 bg-primary text-white rounded-full flex items-center justify-center text-xs font-bold">3</span>
                            <span>Внедрение и тестирование</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <span class="w-6 h-6 bg-primary text-white rounded-full flex items-center justify-center text-xs font-bold">4</span>
                            <span>Поддержка и мониторинг</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
