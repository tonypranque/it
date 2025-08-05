<div class="flex items-center">
    @if($getState())
        <div class="flex items-center justify-center w-8 h-8 bg-primary/10 rounded mr-3">
            @svg($getState(), 'w-4 h-4 text-primary')
        </div>
        <span class="text-sm text-gray-600">
            {{ App\Filament\Resources\ServiceResource::getIconOptions()[$getState()] ?? $getState() }}
        </span>
    @else
        <span class="text-sm text-gray-400">—</span>
    @endif
</div>
