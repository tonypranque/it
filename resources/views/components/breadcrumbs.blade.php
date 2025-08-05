<!--breadcrumbs.blade.php-->
{{-- Breadcrumbs Component --}}
{{-- Usage: --}}
{{-- @component('components.breadcrumbs', ['items' => $breadcrumbItems]) --}}
@props(['items' => []])

@if($items && count($items) > 0)
    <nav class="mb-8" aria-label="Breadcrumb">
        <ol class="flex flex-wrap items-center gap-x-2 text-sm text-muted-foreground">
            @foreach($items as $index => $item)
                @if($index > 0)
                    <li class="flex items-center" aria-hidden="true">
                        <svg class="w-4 h-4 mx-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 18l6-6-6-6" stroke="currentColor" stroke-width="2" fill="none" />
                        </svg>
                    </li>
                @endif
                <li>
                    @if(!$item['active'] && isset($item['url']))
                        <a href="{{ $item['url'] }}" class="hover:text-primary transition-colors">
                            {{ $item['title'] }}
                        </a>
                    @else
                        <span class="text-foreground font-medium">{{ $item['title'] }}</span>
                    @endif
                </li>
            @endforeach
        </ol>
    </nav>

    @php
        $breadcrumbList = [];
        foreach ($items as $index => $item) {
            $breadcrumbList[] = [
                '@type' => 'ListItem',
                'position' => $index + 1,
                'name' => $item['title'],
                'item' => $item['url'] ?? url()->current(),
            ];
        }

        $structuredData = [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => $breadcrumbList,
        ];
    @endphp

    <script type="application/ld+json">
        {!! json_encode($structuredData, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>
@endif
