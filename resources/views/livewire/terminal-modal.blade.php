<div>
    <div x-data="{ open: @entangle('isOpen').defer }" x-cloak>
        <!-- Кнопка "Записаться" в навигации -->
        <a href="#"
           @click="open = true"
           class="bg-blue-700 hover:bg-blue-800 text-white px-4 py-2 custom-font text-xs">
            Записаться
        </a>

        <!-- Модальное окно -->
        <div x-show="open"
             class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
             @keydown.escape="open = false">
            <div class="bg-gray-900 text-green-400 p-6 rounded-lg w-full max-w-md font-mono terminal-shadow">
                <div class="flex justify-between items-center mb-4">
                    <span class="text-sm">TERMINAL: Appointment System</span>
                    <button @click="open = false" class="text-red-400 hover:text-red-300">
                        [X]
                    </button>
                </div>

                <div class="terminal-content">
                    @if($step === 1)
                        <div>
                            <p class="mb-2">> Введите ваше имя:</p>
                            <input
                                wire:model="name"
                                type="text"
                                class="w-full bg-gray-800 text-green-400 border border-green-400 p-2 rounded focus:outline-none"
                                placeholder="Имя..."
                                @keydown.enter="$wire.nextStep()"
                            >
                            @error('name')
                            <span class="text-red-400 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    @else
                        <div>
                            <p class="mb-2">> Введите ваш телефон:</p>
                            <input
                                wire:model="phone"
                                type="text"
                                class="w-full bg-gray-800 text-green-400 border border-green-400 p-2 rounded focus:outline-none"
                                placeholder="+7 (___) ___-__-__"
                                @keydown.enter="$wire.nextStep()"
                            >
                            @error('phone')
                            <span class="text-red-400 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    @endif
                </div>

                <div class="mt-4 flex justify-end">
                    <button
                        wire:click="nextStep"
                        class="bg-green-400 text-gray-900 px-4 py-2 rounded hover:bg-green-300">
                        {{ $step === 1 ? 'Далее' : 'Отправить' }}
                    </button>
                </div>
            </div>
        </div>
    </div>

    <style>
        .terminal-shadow {
            box-shadow: 0 0 10px rgba(0, 255, 0, 0.3);
        }
        [x-cloak] { display: none; }
    </style>
</div>
