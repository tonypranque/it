<?php

// App\Http\Controllers\HomeController.php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        // Основные данные для главной страницы
        $pageData = [
            'title' => 'IT-услуги в Петрозаводске | Абонентское обслуживание, 1С, серверы | KarjalaTech',
            'description' => 'Надежная IT-поддержка и аутсорсинг в Петрозаводске. Обслуживание компьютеров, сетей, серверов и 1С с 2009 года. Карелия.',
            'type' => 'website',
            'url' => route('home'),
            'image' => asset('images/logo.jpg'),
        ];

        // Формируем JSON-LD (можно вынести в сервис позже)
        $schema = $this->generateSchema($pageData);

        return view('welcome', compact('pageData', 'schema'));
    }

    private function generateSchema(array $data): string
    {
        $baseBusiness = [
            '@type' => 'LocalBusiness',
            'name' => 'KarjalaTech',
            'url' => 'https://karjalatech.ru',
            'telephone' => site_setting('phone', '+7 (8142) 28-87-45'),
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
            'openingHoursSpecification' => [
                [
                    '@type' => 'OpeningHoursSpecification',
                    'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                    'opens' => '09:00',
                    'closes' => '18:00',
                ],
            ],
            'priceRange' => '₽₽',
            'sameAs' => [
                'https://vk.com/karjala_tech',
                'https://t.me/karjala_tech',
                'https://yandex.ru/maps/org/karjalatech/1234567890',
            ],
        ];

        $schemaData = match ($data['type']) {
            'website' => [
                '@context' => 'https://schema.org',
                '@type' => 'WebSite',
                'name' => 'KarjalaTech',
                'url' => $data['url'],
                'description' => $data['description'],
                'publisher' => $baseBusiness,
                'potentialAction' => [
                    '@type' => 'SearchAction',
                    'target' => $data['url'] . '?q={search_term}',
                    'query-input' => 'required name=search_term',
                ],
            ],
            'service' => [
                '@context' => 'https://schema.org',
                '@type' => 'Service',
                'serviceType' => $data['title'],
                'description' => $data['description'],
                'url' => $data['url'],
                'provider' => $baseBusiness,
                'areaServed' => ['Петрозаводск', 'Республика Карелия'],
            ],
            default => [
                '@context' => 'https://schema.org',
                '@type' => 'WebPage',
                'name' => $data['title'],
                'description' => $data['description'],
                'url' => $data['url'],
            ],
        };

        return json_encode($schemaData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    }
}
