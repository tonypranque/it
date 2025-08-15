<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * Показать страницу (родительскую или дочернюю)
     */
    public function show(string $parentSlug, string $childSlug = null): View
    {
        if ($childSlug) {
            // Дочерняя страница
            $page = Page::where('slug', $childSlug)
                ->where('is_published', true)
                ->whereHas('parent', function ($query) use ($parentSlug) {
                    $query->where('slug', $parentSlug)
                        ->where('is_published', true);
                })
                ->with('parent')
                ->firstOrFail();
        } else {
            // Родительская страница
            $page = Page::where('slug', $parentSlug)
                ->where('is_published', true)
                ->firstOrFail();
        }

        // Дочерние страницы текущей страницы
        $childPages = $page->children()
            ->where('is_published', true)
            ->orderBy('title') // или 'created_at', 'id'
            ->get();

        // Хлебные крошки (для интерфейса и JSON-LD)
        $breadcrumbItems = [
        ];

        if ($page->parent) {
            $breadcrumbItems[] = [
                'title' => $page->parent->title,
                'url' => route('pages.show', $page->parent->slug),
            ];
        }

        $breadcrumbItems[] = [
            'title' => $page->title,
            'active' => true,
        ];

        // Генерация JSON-LD Schema
        $schema = $this->generatePageSchema($page, $breadcrumbItems);

        return view('pages.show', compact('page', 'childPages', 'breadcrumbItems', 'schema'));
    }

    /**
     * Генерация JSON-LD для страницы
     */
    private function generatePageSchema($page, $breadcrumbItems): string
    {
        // Базовый профиль компании (можно вынести в config)
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

        // Определяем тип страницы для Schema.org
        $schemaType = match ($page->slug) {
            'o-kompanii', 'about' => 'AboutPage',
            'kontakty', 'contacts' => 'ContactPage',
            'tseny', 'tariffs', 'pricing' => 'PriceCatalog',
            'blog', 'novosti' => 'Blog',
            'uslugi' => 'CollectionPage',
            default => 'WebPage',
        };

        $schemaData = [
            '@context' => 'https://schema.org',
            '@type' => $schemaType,
            'name' => $page->title,
            'description' => config('app.name').' - '.$page->title,
            'url' => url()->current(),
            'breadcrumb' => $this->generateBreadcrumbSchema($breadcrumbItems),
        ];


        return json_encode($schemaData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    }

    /**
     * Генерация BreadcrumbList для JSON-LD
     */
    private function generateBreadcrumbSchema(array $items): array
    {
        return [
            '@type' => 'BreadcrumbList',
            'itemListElement' => array_map(function ($item, $index) {
                return [
                    '@type' => 'ListItem',
                    'position' => $index + 1,
                    'name' => $item['title'],
                    'item' => $item['url'] ?? null,
                ];
            }, $items, array_keys($items)),
        ];
    }
}
