{{-- resources/views/components/breadcrumbs.blade.php --}}
@props(['items' => []])

@if($items && count($items) > 0)
    <div class="bg-nc-gray border-b border-border py-4 mt-3">
        <div class="container mx-auto px-4">
            <nav aria-label="Breadcrumb">
                <ol class="flex flex-wrap items-center gap-x-2 text-sm text-muted-foreground">
                    <li>
                        <a href="{{ url('/') }}" class="flex items-center space-x-1 text-muted-foreground hover:text-primary transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            <span>KarjalaTech</span>
                        </a>
                    </li>

                    @foreach($items as $index => $item)
                        <li class="flex items-center" aria-hidden="true">
                            <svg class="w-4 h-4 mx-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M9 18l6-6-6-6" stroke="currentColor" stroke-width="2" fill="none" />
                            </svg>
                        </li>
                        <li>
                            @if(!($item['active'] ?? false) && isset($item['url']))
                                <a href="{{ $item['url'] }}" class="text-muted-foreground hover:text-primary transition-colors">
                                    {{ $item['title'] }}
                                </a>
                            @else
                                <span class="text-foreground font-medium">{{ $item['title'] }}</span>
                            @endif
                        </li>
                    @endforeach
                </ol>
            </nav>
        </div>
    </div>
@endif
