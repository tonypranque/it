<div>
    <section id="contact" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <!-- Заголовок -->
            <div
                x-data="{ inView: false }"
                x-intersect.once="inView = true"
                :class="{ 'opacity-0 translate-y-8': !inView, 'opacity-100 translate-y-0': inView }"
                class="text-center mb-16 transition-all duration-1000 ease-out"
            >
                <div class="inline-block mb-4">
                    <span class="code-highlight">function getSupport() {</span>
                </div>
                <h2 class="text-3xl md:text-4xl font-bold mb-4">
                    Готовы получить <span class="text-primary">IT-поддержку</span>?
                </h2>
                <p class="text-lg text-muted-foreground max-w-2xl mx-auto">
                    Расскажите о ваших потребностях в IT, и мы предложим лучшие решения для вашего бизнеса. Получите бесплатную консультацию!
                </p>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 max-w-6xl mx-auto">
                <!-- Контактная информация -->
                <div
                    x-data="{ inView: false }"
                    x-intersect.once="inView = true"
                    :class="{ 'opacity-0 -translate-x-10': !inView, 'opacity-100 translate-x-0': inView }"
                    class="space-y-6 transition-all duration-700 ease-out"
                >
                    <h3 class="text-xl font-semibold mb-6">Свяжитесь с нами</h3>
                    <div class="space-y-4">
                        <!-- Email -->
                        <div class="flex items-start space-x-4">
                            <div class="w-10 h-10 bg-primary/10 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <div class="font-medium">Email</div>
                                <div class="text-muted-foreground">support@itpro.com</div>
                                <div class="text-muted-foreground">info@itpro.com</div>
                            </div>
                        </div>
                        <!-- Phone -->
                        <div class="flex items-start space-x-4">
                            <div class="w-10 h-10 bg-primary/10 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div>
                                <div class="font-medium">Телефон</div>
                                <div class="text-muted-foreground">+7 (495) 123-45-67</div>
                                <div class="text-muted-foreground">+7 (495) 987-65-43</div>
                            </div>
                        </div>
                        <!-- Location -->
                        <div class="flex items-start space-x-4">
                            <div class="w-10 h-10 bg-primary/10 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <div class="font-medium">Офисы</div>
                                <div class="text-muted-foreground">Москва, Россия</div>
                                <div class="text-muted-foreground">Санкт-Петербург, Россия</div>
                            </div>
                        </div>
                    </div>
                    <!-- График работы -->
                    <div class="retro-panel p-6">
                        <div class="flex items-center space-x-3 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <h4 class="font-semibold">График работы</h4>
                        </div>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span>Понедельник - Пятница</span>
                                <span class="mono-font">9:00 - 18:00</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Суббота</span>
                                <span class="mono-font">10:00 - 14:00</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Воскресенье</span>
                                <span class="mono-font">Только экстренные случаи</span>
                            </div>
                        </div>
                        <div class="mt-4 pt-4 border-t border-gray-700">
                            <div class="text-xs text-muted-foreground mono-font">
                                <span class="text-nc-success">●</span> Среднее время ответа: менее 2 часов
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Форма -->
                <!-- Форма (Livewire) -->
                <div
                    x-data="{ inView: false }"
                    x-intersect.once="inView = true"
                    :class="{ 'opacity-0 translate-x-10': !inView, 'opacity-100 translate-x-0': inView }"
                    class="lg:col-span-2 transition-all duration-700 ease-out"
                >
                    <form wire:submit.prevent="submit" class="retro-panel p-8">
                        <h3 class="text-xl font-semibold mb-6">Получить IT-поддержку</h3>

                        {{-- Сообщение об успехе --}}
                        @if ($successMessage)
                            <div x-data="{ show: true }" x-show="show" x-transition:leave.duration.5000ms
                                 class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                                {{ $successMessage }}
                            </div>
                        @endif

                        {{-- Ошибки валидации --}}
                        @if ($errors->any())
                            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                                <ul class="list-disc list-inside">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="space-y-6">
                            <!-- Имя, Email и Телефон -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <label class="block text-sm font-medium mb-2">Ваше имя *</label>
                                    <input
                                        type="text"
                                        wire:model="name"
                                        required
                                        class="w-full px-4 py-2 bg-input-background border border-border rounded-lg text-foreground placeholder-muted-foreground focus:outline-none focus:ring-2 focus:ring-primary"
                                        placeholder="Иван Иванов"
                                    >
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-2">Email</label>
                                    <input
                                        type="email"
                                        wire:model="email"
                                        {{-- required УДАЛЕН --}}
                                        class="w-full px-4 py-2 bg-input-background border border-border rounded-lg text-foreground placeholder-muted-foreground focus:outline-none focus:ring-2 focus:ring-primary"
                                        placeholder="ivan@company.ru"
                                    >
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-2">Телефон *</label>
                                    <input
                                        type="text"
                                        wire:model="phone"
                                        x-data
                                        x-mask="+7 999 999 99 99" {{-- Добавляем маску --}}
                                        required
                                        class="w-full px-4 py-2 bg-input-background border border-border rounded-lg text-foreground placeholder-muted-foreground focus:outline-none focus:ring-2 focus:ring-primary"
                                        placeholder="+7 9xx xxx xx xx"
                                    >
                                </div>
                            </div>
                            <!-- Компания и сервис -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium mb-2">Название компании</label>
                                    <input
                                        type="text"
                                        wire:model="company"
                                        class="w-full px-4 py-2 bg-input-background border border-border rounded-lg text-foreground placeholder-muted-foreground focus:outline-none focus:ring-2 focus:ring-primary"
                                        placeholder="Ваша компания"
                                    >
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-2">Выберите услугу *</label>
                                    <select
                                        wire:model="service"
                                        required
                                        class="w-full px-4 py-2 bg-input-background border border-border rounded-lg text-foreground focus:outline-none focus:ring-2 focus:ring-primary"
                                    >
                                        <option value="">Выберите услугу</option>
                                        <optgroup label="IT-аутсорсинг и поддержка">
                                            <option value="it-outsourcing">IT-аутсорсинг</option>
                                            <option value="computer-maintenance">Абонентское обслуживание компьютеров</option>
                                            <option value="it-support">IT-поддержка</option>
                                            <option value="software-maintenance">Обслуживание ПО</option>
                                        </optgroup>
                                        <optgroup label="Сетевые решения">
                                            <option value="network-infrastructure">Создание IT-инфраструктуры</option>
                                            <option value="wireless-network">Проектирование и монтаж беспроводной сети</option>
                                            <option value="local-network">Монтаж локальной сети (ЛВС)</option>
                                            <option value="network-administration">Администрирование сети</option>
                                            <option value="ip-telephony">IP-телефония для бизнеса</option>
                                        </optgroup>
                                        <optgroup label="Серверное администрирование">
                                            <option value="server-administration">Администрирование серверов</option>
                                            <option value="server-maintenance">Обслуживание серверов</option>
                                            <option value="server-setup">Настройка и установка серверов</option>
                                            <option value="1c-server-support">Поддержка серверов 1С</option>
                                        </optgroup>
                                        <optgroup label="IT-безопасность и восстановление">
                                            <option value="it-audit">IT-аудит</option>
                                            <option value="it-consulting">IT-консультация</option>
                                            <option value="antivirus-protection">Антивирусная защита</option>
                                            <option value="data-recovery">Восстановление данных</option>
                                        </optgroup>
                                        <optgroup label="1С: Поддержка и внедрение">
                                            <option value="1c-support">Поддержка и сопровождение 1С</option>
                                            <option value="1c-implementation">Внедрение 1С</option>
                                            <option value="1c-licenses">Лицензии 1С</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <!-- Сообщение -->
                            <div>
                                <label class="block text-sm font-medium mb-2">Опишите ваши потребности *</label>
                                <textarea
                                    wire:model="message"
                                    required
                                    rows="5"
                                    class="w-full px-4 py-2 bg-input-background border border-border rounded-lg text-foreground placeholder-muted-foreground resize-none focus:outline-none focus:ring-2 focus:ring-primary"
                                    placeholder="Расскажите о ваших задачах, потребностях в IT-поддержке или администрировании..."
                                ></textarea>
                            </div>
                            <!-- Кнопки -->
                            <div class="flex flex-col sm:flex-row gap-4">
                                <button
                                    type="submit"
                                    wire:loading.attr="disabled"
                                    class="retro-button px-6 py-3 text-lg font-medium flex-1 text-center"
                                >
                                    <span wire:loading.remove>Получить IT-поддержку</span>
                                    <span wire:loading>Отправка...</span>
                                </button>
                                <a
                                    href="#"
                                    class="inline-flex justify-center px-6 py-3 text-lg font-medium border border-primary text-primary hover:bg-primary hover:text-white rounded-lg transition-colors"
                                >
                                    Запланировать звонок
                                </a>
                            </div>
                            <!-- Политика -->
                            <div class="text-xs text-muted-foreground">
                                Отправляя форму, вы соглашаетесь с нашей политикой конфиденциальности. Мы ответим в течение 24 часов.
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
</div>
