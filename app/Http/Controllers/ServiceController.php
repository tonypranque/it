<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\View\View;

class ServiceController extends Controller
{
    /**
     * Показать список всех опубликованных услуг (корневых)
     */
    public function index(): View
    {
        $services = Service::whereNull('parent_id')
            ->where('is_published', true)
            ->orderBy('order')
            ->get();

        // Формируем хлебные крошки
        $breadcrumbItems = [
            ['title' => 'Услуги', 'active' => true],
        ];

        // Генерация JSON-LD для страницы "Все услуги"
        $schema = $this->generateCollectionSchema($services);

        return view('services.index', compact('services', 'breadcrumbItems', 'schema'));
    }

    /**
     * Показать конкретную услугу (с подуслугами)
     */
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
                ->with('parent')
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

        // Все корневые услуги (для навигации)
        $allServices = Service::whereNull('parent_id')
            ->where('is_published', true)
            ->orderBy('order')
            ->get();

        // Хлебные крошки
        $breadcrumbItems = [
            ['title' => 'Услуги', 'url' => route('services.index')],
        ];

        if ($service->parent) {
            $breadcrumbItems[] = [
                'title' => $service->parent->title,
                'url' => route('services.show.parent', $service->parent->slug),
            ];
        }

        $breadcrumbItems[] = [
            'title' => $service->title,
            'active' => true,
        ];

        // Генерация JSON-LD для конкретной услуги
        $schema = $this->generateServiceSchema($service, $breadcrumbItems);

        return view('services.show', compact('service', 'childPages', 'allServices', 'breadcrumbItems', 'schema'));
    }

    /**
     * Генерация JSON-LD для страницы списка услуг (CollectionPage)
     */
    private function generateCollectionSchema($services): string
    {
        $schemaData = [
            '@context' => 'https://schema.org',
            '@type' => 'CollectionPage',
            'name' => 'IT-услуги в Петрозаводске | KarjalaTech',
            'description' => 'Комплексное IT-обслуживание для бизнеса в Карелии: аутсорсинг, серверы, 1С, сети и безопасность.',
            'url' => route('services.index'),
            'mainEntity' => [
                '@type' => 'ItemList',
                'itemListElement' => $services->map(function ($service, $index) {
                    return [
                        '@type' => 'ListItem',
                        'position' => $index + 1,
                        'item' => [
                            '@type' => 'Service',
                            'serviceType' => $service->title,
                            'name' => $service->title,
                            'description' => strip_tags($service->excerpt ?? $service->content ?? ''),
                            'url' => route('services.show.parent', $service->slug),
                        ],
                    ];
                })->toArray(),
            ],
            'breadcrumb' => $this->generateBreadcrumbSchema([
                ['title' => 'Услуги', 'url' => route('services.index')],
            ]),
        ];

        return json_encode($schemaData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    }

    /**
     * Генерация JSON-LD для конкретной услуги (Service)
     */
    private function generateServiceSchema($service, $breadcrumbItems): string
    {
        $baseBusiness = [
            '@type' => 'LocalBusiness',
            'name' => 'KarjalaTech',
            'url' => 'https://karjalatech.ru',
            'telephone' => preg_replace('/[^\d\+]/', '', site_setting('phone')),
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => 'ул. Красная, д. 6',
                'addressLocality' => 'Петрозаводск',
                'addressRegion' => 'Республика Карелия',
                'postalCode' => '185035',
                'addressCountry' => 'RU',
            ],
            'geo' => [
                '@type' => 'GeoCoordinates',
                'latitude' => '61.7850',
                'longitude' => '34.3422',
            ],
            'areaServed' => [
                '@type' => 'City',
                'name' => 'Петрозаводск',
            ],
        ];

        $schemaData = [
            '@context' => 'https://schema.org',
            '@type' => 'Service',
            'serviceType' => $service->title,
            'name' => $service->title,
            'description' => strip_tags($service->excerpt ?? $service->content ?? ''),
            'url' => url()->current(),
            'provider' => $baseBusiness,
            'offers' => [
                '@type' => 'Offer',
                'availability' => 'https://schema.org/InStock',
                'priceSpecification' => [
                    '@type' => 'PriceSpecification',
                    'price' => $service->price ?? null,
                    'priceCurrency' => 'RUB',
                    'valueAddedTaxIncluded' => true,
                ],
            ],
        ];

        // Добавляем подуслуги, если есть
        if ($service->publishedChildren->isNotEmpty()) {
            $schemaData['hasOfferCatalog'] = [
                '@type' => 'OfferCatalog',
                'name' => "Подуслуги: {$service->title}",
                'itemListElement' => $service->publishedChildren->map(function ($sub) {
                    return [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Service',
                            'name' => $sub->title,
                            'description' => strip_tags($sub->excerpt ?? ''),
                            'url' => url()->current() . '/' . $sub->slug,
                        ],
                    ];
                })->toArray(),
            ];
        }

        // Добавляем хлебные крошки
        $schemaData['breadcrumb'] = $this->generateBreadcrumbSchema($breadcrumbItems);

        return json_encode($schemaData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    }

    /**
     * Генерация BreadcrumbList для JSON-LD
     */
    private function generateBreadcrumbSchema(array $items): array
    {
        return [
            '@type' => 'BreadcrumbList',
            'itemListElement' => array_values(array_map(function ($item, $index) {
                return [
                    '@type' => 'ListItem',
                    'position' => $index + 1,
                    'name' => $item['title'],
                    'item' => $item['url'] ?? null,
                ];
            }, $items, array_keys($items))),
        ];
    }
}
