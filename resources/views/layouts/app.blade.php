<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <meta name="description" content="">
    @vite(['resources/css/app.css', 'resources/css/mario.scss', 'resources/js/app.js', 'resources/js/mario.js'])
</head>
<body class="bg-gray-100 font-sans">

<!-- Обновленный код навигации -->
<nav class="bg-blue-600 text-white mx-5 fixed-nav pixel-nav">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 nav-container">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center">
                <a href="/" class="text-xl font-bold custom-font">{{ config('app.name') }}</a>
            </div>
            <div class="hidden sm:flex sm:items-center sm:space-x-4 pixel-font">
                <a href="/" class="nav-link hover:bg-blue-700">Главная</a>
                <div class="dropdown-group">
                    <a href="/services" class="nav-link hover:bg-blue-700">Услуги</a>
                    @php
                        $servicesPage = \App\Models\Page::where('slug', 'services')->first();
                        $subPages = $servicesPage ? $servicesPage->children()->where('is_published', true)->get() : [];
                    @endphp
                    @if($subPages->isNotEmpty())
                        <ul class="dropdown-menu">
                            @foreach($subPages as $subPage)
                                <li>
                                    <a href="{{ url('services/' . $subPage->slug) }}"
                                       class="block px-4 py-2 hover:bg-blue-700 pixel-font">
                                        {{ $subPage->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <a href="/about" class="nav-link hover:bg-blue-700">О нас</a>
                <a href="/contacts" class="nav-link hover:bg-blue-700">Контакты</a>
            </div>
            <div class="hidden sm:flex sm:items-center">
                @livewire('terminal-modal')
            </div>
            <div class="sm:hidden flex items-center">
                <button class="focus:outline-none" aria-label="Toggle mobile menu">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>

<!-- Основной контент -->
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h1 id="welcome-header" class="font-bold text-gray-800 mb-4 pixel-font text-base">Общество Ограниченных Оградкой Хакермены</h1>
    @yield('content')
</main>

<x-footer />
</body>
</html>
