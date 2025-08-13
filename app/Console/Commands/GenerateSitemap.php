<?php

namespace App\Console\Commands;

use App\Models\Page;
use App\Models\Service;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Support\Facades\File; // Добавили для работы с файлами

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Автоматически генерирует sitemap.xml';

    public function handle()
    {
        $this->info('Генерация sitemap.xml...');

        $sitemap = Sitemap::create();

        // 1. Главная страница
        $sitemap->add(Url::create('/')
            ->setPriority(1.0)
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY));

        // 2. Страница услуг
        $sitemap->add(Url::create('/services')
            ->setPriority(0.9)
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY));

        // 3. Все родительские услуги
        Service::whereNull('parent_id')->get()->each(function ($service) use ($sitemap) {
            $url = "/services/{$service->slug}";
            $sitemap->add(Url::create($url)
                ->setLastModificationDate($service->updated_at)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.8));
        });

        // 4. Все дочерние услуги
        Service::whereNotNull('parent_id')->get()->each(function ($service) use ($sitemap) {
            $parent = $service->parent;
            if (!$parent) return;

            $url = "/services/{$parent->slug}/{$service->slug}";
            $sitemap->add(Url::create($url)
                ->setLastModificationDate($service->updated_at)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.7));
        });

        // 5. Все страницы (с parent и опциональным child)
        Page::whereNull('parent_id')->get()->each(function ($page) use ($sitemap) {
            $url = "/{$page->slug}";
            $sitemap->add(Url::create($url)
                ->setLastModificationDate($page->updated_at)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.8));
        });

        Page::whereNotNull('parent_id')->get()->each(function ($page) use ($sitemap) {
            $parent = $page->parent;
            if (!$parent) return;

            $url = "/{$parent->slug}/{$page->slug}";
            $sitemap->add(Url::create($url)
                ->setLastModificationDate($page->updated_at)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.7));
        });

        // Сохраняем в public/sitemap.xml
        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('✅ Sitemap успешно сгенерирован: ' . public_path('sitemap.xml'));

        // === Добавляем генерацию robots.txt ===
        $this->info('Генерация robots.txt...');

        $robotsContent = $this->generateRobotsTxtContent();
        File::put(public_path('robots.txt'), $robotsContent);

        $this->info('✅ Robots.txt успешно сгенерирован: ' . public_path('robots.txt'));
        // === Конец генерации robots.txt ===
    }

    /**
     * Генерирует содержимое файла robots.txt
     */
    private function generateRobotsTxtContent(): string
    {
        // Получаем URL-адреса из sitemap.xml
        $sitemapPath = public_path('sitemap.xml');
        $allowedUrls = [];

        if (file_exists($sitemapPath)) {
            $sitemapXml = simplexml_load_file($sitemapPath);
            // Пространства имён
            $namespaces = $sitemapXml->getNamespaces(true);
            $namespace = isset($namespaces['']) ? $namespaces[''] : 'http://www.sitemaps.org/schemas/sitemap/0.9';

            foreach ($sitemapXml->children($namespace)->url as $url) {
                $loc = (string) $url->loc;
                // Преобразуем полный URL в путь
                $path = parse_url($loc, PHP_URL_PATH);
                if ($path) {
                    // Добавляем символ $ в конце для точного совпадения пути
                    $allowedUrls[] = $path . '$';
                }
            }
        }

        // Формируем содержимое robots.txt
        $lines = [
            'User-agent: *',
            'Disallow: /', // Запрещаем всё по умолчанию
        ];

        // Добавляем разрешённые URL
        foreach (array_unique($allowedUrls) as $url) {
            $lines[] = "Allow: $url";
        }

        // Исключаем служебные пути Laravel, которые физически в public
        $lines[] = '';
        $lines[] = 'Disallow: /livewire/';
        $lines[] = 'Disallow: /storage/';
        // Не добавляем rulethechaos и другие админские пути, чтобы не раскрывать их

        $lines[] = '';
        $lines[] = 'Sitemap: ' . url('sitemap.xml');
        $lines[] = 'Host: ' . parse_url(url('/'), PHP_URL_HOST);

        return implode("\n", $lines);
    }
}
