<footer class="bg-gray-900 text-white py-12">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">

            <!-- Логотип и соцсети -->
            <div class="space-y-4">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-primary rounded-lg flex items-center justify-center">
                        <img src="/images/logo.jpg" alt="Logo" class="w-12 h-12">
                    </div>
                    <div>
                        <h2 class="text-xl font-bold">{{ config('app.name') }}</h2>
                        <p class="text-xs text-gray-400 mono-font">IT-поддержка</p>
                    </div>
                </div>
                <p class="text-sm text-gray-300 leading-relaxed">
                    Надежные услуги IT-поддержки и администрирования для вашего бизнеса.
                    Обеспечиваем стабильность с 2009 года.
                </p>
                <div class="flex space-x-4">
                    <a href="{{ site_setting("tg_username") }}" class="w-8 h-8 bg-gray-700 hover:bg-primary rounded-lg flex items-center justify-center transition-colors duration-300">
                        <svg width="24px" height="24px" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M41.4193 7.30899C41.4193 7.30899 45.3046 5.79399 44.9808 9.47328C44.8729 10.9883 43.9016 16.2908 43.1461 22.0262L40.5559 39.0159C40.5559 39.0159 40.3401 41.5048 38.3974 41.9377C36.4547 42.3705 33.5408 40.4227 33.0011 39.9898C32.5694 39.6652 24.9068 34.7955 22.2086 32.4148C21.4531 31.7655 20.5897 30.4669 22.3165 28.9519L33.6487 18.1305C34.9438 16.8319 36.2389 13.8019 30.8426 17.4812L15.7331 27.7616C15.7331 27.7616 14.0063 28.8437 10.7686 27.8698L3.75342 25.7055C3.75342 25.7055 1.16321 24.0823 5.58815 22.459C16.3807 17.3729 29.6555 12.1786 41.4193 7.30899Z" fill="#ffffff"></path> </g></svg>
                    </a>
                    <a href="{{ site_setting("vk_username") }}" class="w-8 h-8 bg-gray-700 hover:bg-primary rounded-lg flex items-center justify-center transition-colors duration-300">
                        <svg width="24px" height="24px" fill="#ffffff" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M17.802 12.298s1.617 1.597 2.017 2.336a.127.127 0 0 1 .018.035c.163.273.203.487.123.645-.135.261-.592.392-.747.403h-2.858c-.199 0-.613-.052-1.117-.4-.385-.269-.768-.712-1.139-1.145-.554-.643-1.033-1.201-1.518-1.201a.548.548 0 0 0-.18.03c-.367.116-.833.639-.833 2.032 0 .436-.344.684-.585.684H9.674c-.446 0-2.768-.156-4.827-2.327C2.324 10.732.058 5.4.036 5.353c-.141-.345.155-.533.475-.533h2.886c.387 0 .513.234.601.444.102.241.48 1.205 1.1 2.288 1.004 1.762 1.621 2.479 2.114 2.479a.527.527 0 0 0 .264-.07c.644-.354.524-2.654.494-3.128 0-.092-.001-1.027-.331-1.479-.236-.324-.638-.45-.881-.496.065-.094.203-.238.38-.323.441-.22 1.238-.252 2.029-.252h.439c.858.012 1.08.067 1.392.146.628.15.64.557.585 1.943-.016.396-.033.842-.033 1.367 0 .112-.005.237-.005.364-.019.711-.044 1.512.458 1.841a.41.41 0 0 0 .217.062c.174 0 .695 0 2.108-2.425.62-1.071 1.1-2.334 1.133-2.429.028-.053.112-.202.214-.262a.479.479 0 0 1 .236-.056h3.395c.37 0 .621.056.67.196.082.227-.016.92-1.566 3.016-.261.349-.49.651-.691.915-1.405 1.844-1.405 1.937.083 3.337z"></path></g></svg>
                    </a>
                    <a href="mailto:{{ site_setting("email") }}" class="w-8 h-8 bg-gray-700 hover:bg-primary rounded-lg flex items-center justify-center transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Услуги -->
            <div>
                <h4 class="font-semibold mb-4">Услуги</h4>
                <ul class="space-y-2 text-sm text-gray-300">
                    @foreach($services as $service)
                        <li>
                            <a href="{{ $service['url'] }}" class="hover:text-white transition-colors duration-300">
                                {{ $service['title'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- О компании -->
            <div>
                <h4 class="font-semibold mb-4">О компании</h4>
                <ul class="space-y-2 text-sm text-gray-300">
                    @foreach($companyLinks as $link)
                        <li>
                            <a href="{{ $link['url'] }}" class="hover:text-white transition-colors duration-300">
                                {{ $link['name'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Ресурсы -->
            <div>
                <h4 class="font-semibold mb-4">Ресурсы</h4>
                <ul class="space-y-2 text-sm text-gray-300">
                    @foreach($resources as $resource)
                        <li>
                            <a href="{{ $resource['url'] }}" class="hover:text-white transition-colors duration-300">
                                {{ $resource['name'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Нижняя строка -->
        <div class="border-t border-gray-700 mt-8 pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="text-sm text-gray-400">
                    © 2025 {{ config('app.name') }}
                </p>
                <div class="flex items-center space-x-4 mt-4 md:mt-0 text-xs text-gray-500 mono-font">
                    <span>Версия: v2.1.3</span>
                    <span>•</span>
                    <span>Статус: ОНЛАЙН</span>
                    <span>•</span>
                    <span>Доступность: 99.9%</span>
                </div>
            </div>
        </div>
    </div>
</footer>
