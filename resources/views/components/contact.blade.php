<!--components/contact.blade.php-->
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
            <div
                x-data="{ inView: false }"
                x-intersect.once="inView = true"
                :class="{ 'opacity-0 translate-x-10': !inView, 'opacity-100 translate-x-0': inView }"
                class="lg:col-span-2 transition-all duration-700 ease-out"
            >
                <form action="{{ route('contact.store') }}" method="POST" class="retro-panel p-8">
                    @csrf
                    <h3 class="text-xl font-semibold mb-6">Получить IT-поддержку</h3>
                    <div class="space-y-6">

                        <!-- Имя и Email -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium mb-2">Ваше имя *</label>
                                <input
                                    type="text"
                                    name="name"
                                    value="{{ old('name') }}"
                                    required
                                    class="w-full px-4 py-2 bg-input-background border border-border rounded-lg text-foreground placeholder-muted-foreground focus:outline-none focus:ring-2 focus:ring-primary"
                                    placeholder="Иван Иванов"
                                >
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-2">Email *</label>
                                <input
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    required
                                    class="w-full px-4 py-2 bg-input-background border border-border rounded-lg text-foreground placeholder-muted-foreground focus:outline-none focus:ring-2 focus:ring-primary"
                                    placeholder="ivan@company.ru"
                                >
                            </div>
                        </div>

                        <!-- Компания и сервис -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium mb-2">Название компании</label>
                                <input
                                    type="text"
                                    name="company"
                                    value="{{ old('company') }}"
                                    class="w-full px-4 py-2 bg-input-background border border-border rounded-lg text-foreground placeholder-muted-foreground focus:outline-none focus:ring-2 focus:ring-primary"
                                    placeholder="Ваша компания"
                                >
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-2">Выберите услугу *</label>
                                <select
                                    name="service"
                                    required
                                    class="w-full px-4 py-2 bg-input-background border border-border rounded-lg text-foreground focus:outline-none focus:ring-2 focus:ring-primary"
                                >
                                    <option value="">Выберите услугу</option>
                                    <optgroup label="IT-аутсорсинг и поддержка">
                                        <option value="it-outsourcing" {{ old('service') == 'it-outsourcing' ? 'selected' : '' }}>IT-аутсорсинг</option>
                                        <option value="computer-maintenance" {{ old('service') == 'computer-maintenance' ? 'selected' : '' }}>Абонентское обслуживание компьютеров</option>
                                        <option value="it-support" {{ old('service') == 'it-support' ? 'selected' : '' }}>IT-поддержка</option>
                                        <option value="software-maintenance" {{ old('service') == 'software-maintenance' ? 'selected' : '' }}>Обслуживание ПО</option>
                                    </optgroup>
                                    <optgroup label="Сетевые решения">
                                        <option value="network-infrastructure" {{ old('service') == 'network-infrastructure' ? 'selected' : '' }}>Создание IT-инфраструктуры</option>
                                        <option value="wireless-network" {{ old('service') == 'wireless-network' ? 'selected' : '' }}>Проектирование и монтаж беспроводной сети</option>
                                        <option value="local-network" {{ old('service') == 'local-network' ? 'selected' : '' }}>Монтаж локальной сети (ЛВС)</option>
                                        <option value="network-administration" {{ old('service') == 'network-administration' ? 'selected' : '' }}>Администрирование сети</option>
                                        <option value="ip-telephony" {{ old('service') == 'ip-telephony' ? 'selected' : '' }}>IP-телефония для бизнеса</option>
                                    </optgroup>
                                    <optgroup label="Серверное администрирование">
                                        <option value="server-administration" {{ old('service') == 'server-administration' ? 'selected' : '' }}>Администрирование серверов</option>
                                        <option value="server-maintenance" {{ old('service') == 'server-maintenance' ? 'selected' : '' }}>Обслуживание серверов</option>
                                        <option value="server-setup" {{ old('service') == 'server-setup' ? 'selected' : '' }}>Настройка и установка серверов</option>
                                        <option value="1c-server-support" {{ old('service') == '1c-server-support' ? 'selected' : '' }}>Поддержка серверов 1С</option>
                                    </optgroup>
                                    <optgroup label="IT-безопасность и восстановление">
                                        <option value="it-audit" {{ old('service') == 'it-audit' ? 'selected' : '' }}>IT-аудит</option>
                                        <option value="it-consulting" {{ old('service') == 'it-consulting' ? 'selected' : '' }}>IT-консультация</option>
                                        <option value="antivirus-protection" {{ old('service') == 'antivirus-protection' ? 'selected' : '' }}>Антивирусная защита</option>
                                        <option value="data-recovery" {{ old('service') == 'data-recovery' ? 'selected' : '' }}>Восстановление данных</option>
                                    </optgroup>
                                    <optgroup label="1С: Поддержка и внедрение">
                                        <option value="1c-support" {{ old('service') == '1c-support' ? 'selected' : '' }}>Поддержка и сопровождение 1С</option>
                                        <option value="1c-implementation" {{ old('service') == '1c-implementation' ? 'selected' : '' }}>Внедрение 1С</option>
                                        <option value="1c-licenses" {{ old('service') == '1c-licenses' ? 'selected' : '' }}>Лицензии 1С</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>

                        <!-- Сообщение -->
                        <div>
                            <label class="block text-sm font-medium mb-2">Опишите ваши потребности *</label>
                            <textarea
                                name="message"
                                required
                                rows="5"
                                class="w-full px-4 py-2 bg-input-background border border-border rounded-lg text-foreground placeholder-muted-foreground resize-none focus:outline-none focus:ring-2 focus:ring-primary"
                                placeholder="Расскажите о ваших задачах, потребностях в IT-поддержке или администрировании..."
                            >{{ old('message') }}</textarea>
                        </div>

                        <!-- Кнопки -->
                        <div class="flex flex-col sm:flex-row gap-4">
                            <button
                                type="submit"
                                class="retro-button px-6 py-3 text-lg font-medium flex-1 text-center"
                            >
                                Получить IT-поддержку
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
