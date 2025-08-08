<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\View\View;

class ServiceController extends Controller
{
    // Показать список всех опубликованных услуг (корневых)
    public function index(): View
    {
        $services = Service::whereNull('parent_id')
            ->where('is_published', true)
            ->orderBy('order')
            ->get();

        // Формируем хлебные крошки для страницы списка услуг
        $breadcrumbItems = [
           /* ['title' => 'Главная', 'url' => route('home')], // Предполагается, что у вас есть именованный маршрут 'home'*/
            ['title' => 'Услуги', 'active' => true], // Текущая страница
        ];

        return view('services.index', compact('services', 'breadcrumbItems'));
    }

    // Показать конкретную услугу (с подуслугами)
    public function show(string $parentSlug = null, string $childSlug = null): View
    {
        $service = null;
        $childPages = collect();

        if ($childSlug) {
            // Подуслуга
            $service = Service::where('slug', $childSlug)
                ->where('is_published', true)
                ->whereHas('parent', function ($query) use ($parentSlug) {
                    $query->where('slug', $parentSlug)->where('is_published', true);
                })
                ->firstOrFail();

            $childPages = $service->publishedChildren;
        } else {
            // Корневая услуга
            $service = Service::where('slug', $parentSlug)
                ->whereNull('parent_id')
                ->where('is_published', true)
                ->firstOrFail();

            $childPages = $service->publishedChildren;
        }

        // Получаем все корневые услуги для отображения в секции
        $allServices = Service::whereNull('parent_id')
            ->where('is_published', true)
            ->orderBy('order')
            ->get();

        // Формируем хлебные крошки для страницы конкретной услуги
        $breadcrumbItems = [
            /*['title' => 'Главная', 'url' => route('home')], // Предполагается, что у вас есть именованный маршрут 'home'*/
            ['title' => 'Услуги', 'url' => route('services.index')],
        ];

        // Если это подуслуга, добавляем родительскую услугу в крошки
        if ($service->parent) {
            $breadcrumbItems[] = [
                'title' => $service->parent->title,
                'url' => route('services.show.parent', $service->parent->slug)
            ];
        }

        // Добавляем текущую услугу
        $breadcrumbItems[] = [
            'title' => $service->title,
            'active' => true // Текущая страница
        ];


        return view('services.show', compact('service', 'childPages', 'allServices', 'breadcrumbItems'));
    }
}
