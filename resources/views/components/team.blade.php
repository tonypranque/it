<section id="team" class="py-20 bg-nc-gray">
    <div class="container mx-auto px-4">
        <!-- Заголовок -->
        <div
            x-data="{ inView: false }"
            x-intersect.once="inView = true"
            :class="{ 'opacity-0 translate-y-8': !inView, 'opacity-100 translate-y-0': inView }"
            class="text-center mb-16 transition-all duration-1000 ease-out"
        >
            <div class="inline-block mb-4">
                <span class="code-highlight">class ITSupportTeam {</span>
            </div>
            <h2 class="text-3xl md:text-4xl font-bold mb-4">
                Наша <span class="text-primary">команда</span>
            </h2>
            <p class="text-lg text-muted-foreground max-w-2xl mx-auto">
                Эксперты в системном администрировании, IT-поддержке и внедрении 1С.
                Мы обеспечиваем стабильность и безопасность вашего бизнеса.
            </p>
        </div>

        @php
            use App\Models\TeamMember;
            $teamMembers = TeamMember::orderBy('order')->get();
        @endphp

            <!-- Сетка карточек -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-2 max-w-6xl mx-auto">
            @foreach($teamMembers as $index => $member)
                <div
                    x-data="{ inView: false }"
                    x-intersect.once="inView = true"
                    :class="{ 'opacity-0 translate-y-10': !inView, 'opacity-100 translate-y-0': inView }"
                    class="transition-all duration-700 ease-out"
                    style="transition-delay: {{ $index * 150 }}ms"
                >
                    <div class="retro-panel p-6 text-center space-y-4">
                        <!-- Фото -->
                        <div class="relative mx-auto w-32 h-32 rounded-lg overflow-hidden border-2 border-primary/30">
                            <img
                                src="{{ $member->photo_url }}"
                                alt="{{ $member->name }}"
                                class="w-full h-full object-cover"
                            >
                            <div class="absolute inset-0 bg-black/10 pointer-events-none"></div>
                        </div>
                        <!-- Имя и роль -->
                        <div>
                            <h3 class="font-bold text-foreground">{{ $member->name }}</h3>
                            <p class="text-sm text-muted-foreground">{{ $member->role }}</p>
                        </div>
                        <!-- Соцсети -->
                        <div class="flex justify-center space-x-4">
                            @if($member->social_links && is_array($member->social_links))
                                @foreach($member->social_links as $link)
                                    @php
                                        $url = $link['url'] ?? '#';
                                        $type = $link['type'] ?? '';

                                        // Если это email, добавляем mailto:
                                        if ($type === 'email' && filter_var($url, FILTER_VALIDATE_EMAIL)) {
                                            $href = 'mailto:' . $url;
                                        }
                                        // Если это URL, оставляем как есть
                                        elseif (filter_var($url, FILTER_VALIDATE_URL)) {
                                            $href = $url;
                                        }
                                        // В остальных случаях - #
                                        else {
                                            $href = '#';
                                        }
                                    @endphp

                                    <a href="{{ $href }}" class="text-muted-foreground hover:text-primary transition-colors">
                                        @if($type === 'telegram')
                                            <svg width="24px" height="24px" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M41.4193 7.30899C41.4193 7.30899 45.3046 5.79399 44.9808 9.47328C44.8729 10.9883 43.9016 16.2908 43.1461 22.0262L40.5559 39.0159C40.5559 39.0159 40.3401 41.5048 38.3974 41.9377C36.4547 42.3705 33.5408 40.4227 33.0011 39.9898C32.5694 39.6652 24.9068 34.7955 22.2086 32.4148C21.4531 31.7655 20.5897 30.4669 22.3165 28.9519L33.6487 18.1305C34.9438 16.8319 36.2389 13.8019 30.8426 17.4812L15.7331 27.7616C15.7331 27.7616 14.0063 28.8437 10.7686 27.8698L3.75342 25.7055C3.75342 25.7055 1.16321 24.0823 5.58815 22.459C16.3807 17.3729 29.6555 12.1786 41.4193 7.30899Z" fill="#627582"></path>
                                            </svg>
                                        @elseif($type === 'email')
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                        @endif
                                    </a>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
    <!-- Призыв в команду -->
    <div
        x-data="{ inView: false }"
        x-intersect.once="inView = true"
        :class="{ 'opacity-0 translate-y-8': !inView, 'opacity-100 translate-y-0': inView }"
        class="text-center mt-5 mb-12 max-w-2xl mx-auto transition-all duration-1000 ease-out"
    >
        <p class="text-lg text-foreground mb-4">
            <strong>Хочешь стать частью нашей команды?</strong> Мы ищем специалистов, готовых обеспечивать надежную IT-поддержку и расти вместе с нами.
        </p>
        <a
            href="#vacancies"
            class="retro-button inline-flex px-8 py-3 text-lg font-medium rounded-xl"
        >
            Смотреть вакансии
        </a>
    </div>
</section>
