<?php

namespace App\Console\Commands;

use App\Models\Page;
use App\Models\Service;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

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
    }
}
