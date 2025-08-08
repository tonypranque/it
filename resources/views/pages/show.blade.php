@extends('layouts.app')

@section('title', $page->title . ' - ' . config('app.name'))
@section('description', Str::limit(strip_tags($page->content ?? ''), 160))

@section('meta')
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $page->title }} - {{ config('app.name') }}">
    <meta property="og:description" content="{{ Str::limit(strip_tags($page->content ?? ''), 160) }}">
    <meta property="og:image" content="{{ asset('images/og-page.jpg') }}">
    <meta property="og:site_name" content="{{ config('app.name') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="{{ $page->title }} - {{ config('app.name') }}">
    <meta property="twitter:description" content="{{ Str::limit(strip_tags($page->content ?? ''), 160) }}">
    <meta property="twitter:image" content="{{ asset('images/og-page.jpg') }}">

    <!-- Schema.org для структурированных данных -->
{{--    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "WebPage",
            "name": "{{ $page->title }}",
        "description": "{{ Str::limit(strip_tags($page->content ?? ''), 160) }}",
        "url": "{{ url()->current() }}",
        "publisher": {
            "@type": "Organization",
            "name": "{{ config('app.name') }}",
            "url": "{{ route('home') }}"
        }
    }
    </script>--}}
@endsection

@section('content')
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4 max-w-6xl">
            <h1 class="text-3xl font-bold mb-4 pixel-font text-gray-800">{{ $page->title }}</h1>
            <div class="prose max-w-none text-gray-700">
                {!! $page->content !!}
            </div>

            @if(!$page->parent && $childPages->isNotEmpty())
                <div class="mt-8 ">
                    <h2 class="text-2xl font-semibold mb-4 pixel-font text-gray-800">Подразделы</h2>
                    <ul class="px-5 grid grid-cols-1 sm:grid-cols-2 gap-4 ">
                        @foreach($childPages as $childPage)
                            <li>
                                <a href="{{ url($page->slug . '/' . $childPage->slug) }}"
                                   class="block bg-blue-100 hover:bg-blue-200 text-blue-600 px-4 py-3 rounded-md pixel-font transition-colors duration-200">
                                    {{ $childPage->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </section>

@endsection
