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
            'telephone' => '+7-921-755-12-34',
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
            'description' => strip_tags($page->excerpt ?? substr($page->content, 0, 160)),
            'url' => url()->current(),
            'breadcrumb' => $this->generateBreadcrumbSchema($breadcrumbItems),
        ];

        // Добавляем provider для About, Contact и т.п.
        if (in_array($page->slug, ['about', 'o-kompanii', 'contacts', 'kontakty'])) {
            $schemaData['provider'] = $baseBusiness;
        }

        // Для страницы "О компании" — дополнительные данные
        if ($page->slug === 'about' || $page->slug === 'o-kompanii') {
            $schemaData['foundingDate'] = '2009';
            $schemaData['numberOfEmployees'] = 10;
            $schemaData['description'] = 'IT-аутсорсинг и техподдержка для бизнеса в Карелии с 2009 года.';
        }

        // Для контактов — контактная точка
        if ($page->slug === 'contacts' || $page->slug === 'kontakty') {
            $schemaData['mainEntity'] = [
                '@type' => 'ContactPoint',
                'contactType' => 'Консультация по IT-обслуживанию',
                'telephone' => '+7-921-755-12-34',
                'availableLanguage' => 'Русский',
                'areaServed' => 'RU',
                'email' => 'info@karjalatech.ru',
            ];
        }

        // Для тарифов — можно добавить OfferCatalog
        if ($page->slug === 'tariffs' || $page->slug === 'tseny') {
            $schemaData['hasOfferCatalog'] = [
                '@type' => 'OfferCatalog',
                'name' => 'Тарифы на IT-поддержку',
                'itemListElement' => [
                    [
                        '@type' => 'OfferCatalog',
                        'name' => 'Базовый',
                        'itemListElement' => [
                            [
                                '@type' => 'Offer',
                                'itemOffered' => [
                                    '@type' => 'Service',
                                    'name' => 'Базовая IT-поддержка',
                                    'description' => 'Техподдержка до 5 рабочих мест',
                                ],
                            ],
                        ],
                    ],
                    [
                        '@type' => 'OfferCatalog',
                        'name' => 'Стандарт',
                        'itemListElement' => [
                            [
                                '@type' => 'Offer',
                                'itemOffered' => [
                                    '@type' => 'Service',
                                    'name' => 'Расширенная IT-поддержка',
                                    'description' => 'Поддержка до 15 рабочих мест и 1 сервер',
                                ],
                            ],
                        ],
                    ],
                ],
            ];
        }

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
