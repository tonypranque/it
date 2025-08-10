<section id="portfolio" class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <!-- Заголовок -->
        <div
            x-data="{ inView: false }"
            x-intersect.once="inView = true"
            :class="{ 'opacity-0 translate-y-8': !inView, 'opacity-100 translate-y-0': inView }"
            class="text-center mb-16 transition-all duration-1000 ease-out"
        >
            <div class="inline-block mb-4">
                <span class="code-highlight">function clientTestimonials() {</span>
            </div>
            <h2 class="text-3xl md:text-4xl font-bold mb-4">
                Клиентские <span class="text-primary">Рекомендации</span>
            </h2>
            <p class="text-lg text-muted-foreground max-w-2xl mx-auto">
                Реальные благодарности от компаний, с которыми мы работали.
                Каждый скан — подтверждение качества и доверия.
            </p>
        </div>

        <!-- Сетка карточек -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 max-w-6xl mx-auto">
            @php
                $letters = \App\Models\ThanksLetter::all();
            @endphp

            @foreach($letters as $index => $item)
                <div
                    x-data="{ inView: false }"
                    x-intersect.once="inView = true"
                    :class="{ 'opacity-0 translate-y-10': !inView, 'opacity-100 translate-y-0': inView }"
                    class="transition-all duration-700 ease-out"
                    style="transition-delay: {{ $index * 100 }}ms"
                >
                    <div
                        class="retro-panel overflow-hidden cursor-pointer group"
                        @click="$dispatch('open-thanks-modal', '{{ $item->full_image }}')"
                    >

                        <div class="relative w-full" style="padding-bottom: 130%;">
                            <div class="absolute inset-0 bg-gray-100">
                                <img
                                    src="{{ $item->thumbnail }}"
                                    alt="Превью: {{ $item->title }}"
                                    class="w-full h-full object-cover object-top group-hover:brightness-110 transition-all duration-300"
                                >
                            </div>
                        </div>

                        <div class="p-4 border-t border-border">
                            <h3 class="font-semibold text-foreground">{{ $item->title }}</h3>
                            <p class="text-sm text-muted-foreground mono-font mt-1">Формат A4 • JPG/Scan</p>
                        </div>

                        <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>


<!-- Модальное окно -->
<div
    x-data="portfolioModal"
    x-show="isOpen"
    @open-thanks-modal.window="open($event.detail)"
    @keydown.escape.window="close"
    class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/80 backdrop-blur-sm"
    x-cloak
>
    <!-- Подложка -->
    <div
        class="absolute inset-0"
        @click.self="close"
    ></div>

    <!-- Контент модального окна -->
    <div class="relative max-w-4xl max-h-full">
        <button
            @click="close"
            class="absolute -top-12 right-0 text-white hover:text-gray-300 text-xl flex items-center gap-1"
        >
            × Закрыть
        </button>
        <img
            :src="imageUrl"
            alt="Полный просмотр благодарности"
            class="w-full h-auto max-h-[90vh] object-contain rounded-lg shadow-2xl"
        >
    </div>
</div>

<!-- Alpine Data Component -->
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('portfolioModal', () => ({
            isOpen: false,
            imageUrl: '',
            open(url) {
                this.imageUrl = url;
                this.isOpen = true;
            },
            close() {
                this.isOpen = false;
                this.imageUrl = '';
            }
        }));
    });
</script>
