{{-- resources/views/layouts/app.blade.php --}}
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Основные мета-теги -->
    <title>{{ $title ?? config('app.name', 'Laravel') }}</title>
    <meta name="description" content="{{ $description ?? 'IT-услуги и решения для вашего бизнеса' }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $title ?? config('app.name') }}">
    <meta property="og:description" content="{{ $description ?? 'IT-услуги и решения для вашего бизнеса' }}">
    <meta property="og:image" content="{{ $ogImage ?? asset('images/og-default.jpg') }}">
    <meta property="og:site_name" content="{{ config('app.name') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="{{ $title ?? config('app.name') }}">
    <meta property="twitter:description" content="{{ $description ?? 'IT-услуги и решения для вашего бизнеса' }}">
    <meta property="twitter:image" content="{{ $ogImage ?? asset('images/og-default.jpg') }}">

    <!-- Canonical -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Дополнительные мета-теги -->
    @yield('meta')

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="min-h-screen bg-background">
    <x-header />

    {{-- Контейнер, который компенсирует высоту фиксированного хедера --}}
    {{-- Все, что внутри этого div, будет ниже хедера --}}
    <div class="fixed-header-spacer">
        {{-- Вставка хлебных крошек --}}
        @if(isset($breadcrumbItems) && !empty($breadcrumbItems))
            <x-breadcrumbs :items="$breadcrumbItems" />
        @endif

        <main>
            @yield('content')
            @livewire('contact-form')
        </main>

        <x-footer />
    </div>
</div>
</body>
</html>
