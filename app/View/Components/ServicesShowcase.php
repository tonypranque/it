<?php

namespace App\View\Components;

use App\Models\Service;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ServicesShowcase extends Component
{
    public $title;
    public $subtitle;
    public $services;
    public $limit;
    public $columns;
    public $showButton;
    public $buttonText;
    public $buttonUrl;

    public function __construct(
        $title = 'Наши <span class="text-primary">IT-услуги</span>',
        $subtitle = 'Надежные решения для поддержки и администрирования вашей IT-инфраструктуры, обеспечивающие стабильность бизнеса.',
        $limit = 6,
        $columns = '3',
        $showButton = true,
        $buttonText = 'Все услуги',
        $buttonUrl = null
    ) {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->limit = $limit;
        $this->columns = $columns;
        $this->showButton = $showButton;
        $this->buttonText = $buttonText;
        $this->buttonUrl = $buttonUrl ?? route('services.index');

        // Получаем услуги
        $this->services = Service::whereNull('parent_id')
            ->where('is_published', true)
            ->orderBy('order')
            ->limit($this->limit)
            ->get();
    }

    public function gridColumns(): string
    {
        return match($this->columns) {
            '1' => 'grid-cols-1',
            '2' => 'grid-cols-1 md:grid-cols-2',
            '3' => 'grid-cols-1 md:grid-cols-2 lg:grid-cols-3',
            '4' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-4',
            default => 'grid-cols-1 md:grid-cols-2 lg:grid-cols-3'
        };
    }

    public function render(): View|Closure|string
    {
        return view('components.services-showcase');
    }
}
