@extends('layouts.app')

@section('title', $page->title)

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-3xl font-bold mb-4 pixel-font text-gray-800">{{ $page->title }}</h1>
        <div class="prose max-w-none text-gray-700">
            {!! $page->content !!}
        </div>

        @if(!$page->parent && $childPages->isNotEmpty())
            <div class="mt-8">
                <h2 class="text-2xl font-semibold mb-4 pixel-font text-gray-800">Подстраницы</h2>
                <ul class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach($childPages as $childPage)
                        <li>
                            <a href="{{ url($page->slug . '/' . $childPage->slug) }}"
                               class="block bg-blue-100 hover:bg-blue-200 text-blue-600 px-4 py-3 rounded-md pixel-font">
                                {{ $childPage->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection
