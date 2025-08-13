<?php

namespace App\View\Components;

use App\Models\Service;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Footer extends Component
{
    public $services;
    public $companyLinks;
    public $resources;

    public function __construct()
    {
        // Получаем услуги для футера
        $this->services = Service::getRootPublished(5);

        // Статичные ссылки
        $this->companyLinks = [
            ['name' => 'О нас', 'url' => '#about'],
            ['name' => 'Наша команда', 'url' => '/#team'],
            ['name' => 'Вакансии', 'url' => '/vacancy'],
            ['name' => 'Отзывы клиентов', 'url' => '/#portfolio'],
            ['name' => 'Связаться с нами', 'url' => '#contact'],
        ];

        $this->resources = [
            ['name' => 'Реквизиты компании', 'url' => '/requisites'],
            ['name' => 'Политика конфиденциальности', 'url' => '/privacy-policy'],
            ['name' => 'Техническая поддержка', 'url' => '#contact'],
        ];
    }

    public function render(): View|Closure|string
    {
        return view('components.footer', [
            'services' => $this->services,
            'companyLinks' => $this->companyLinks,
            'resources' => $this->resources,
        ]);
    }
}
