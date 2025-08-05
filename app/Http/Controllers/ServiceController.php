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

        return view('services.index', compact('services'));
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

        return view('services.show', compact('service', 'childPages', 'allServices'));
    }
}
