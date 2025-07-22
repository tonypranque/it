<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>title</title>
    <meta name="description" content="">
    @vite(['resources/css/app.css', 'resources/css/mario.scss', 'resources/js/app.js', 'resources/js/mario.js'])
</head>
<body class="bg-gray-100 font-sans">
<x-nav />

<!-- Content -->
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 lg:mt-20">
    <h1 id="welcome-header" class="font-bold text-gray-800 mb-4 pixel-font text-base">Общество Ограниченных Оградкой Хакермены</h1>
    @yield('content')
</main>

 <x-footer />
</body>
</html>
