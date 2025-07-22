<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        // Создаем родительскую страницу "Услуги"
        $servicesPage = Page::create([
            'title' => 'Услуги',
            'slug' => 'services',
            'content' => '<p>Наши основные услуги.</p>',
            'is_published' => true,
        ]);

        // Создаем подстраницы для "Услуги"
        Page::create([
            'title' => 'ИТ-аутсорсинг',
            'slug' => 'it-outsource',
            'content' => '<p>Услуги ИТ-аутсорсинга для вашего бизнеса.</p>',
            'is_published' => true,
            'parent_id' => $servicesPage->id,
        ]);

        Page::create([
            'title' => 'Контакты',
            'slug' => 'contacts',
            'content' => '<p>Наши контакты</p>',
            'is_published' => true,
            'parent_id' => $servicesPage->id,
        ]);

        // Дополнительная родительская страница, например, "О нас"
        Page::create([
            'title' => 'О нас',
            'slug' => 'about',
            'content' => '<p>Информация о нашей компании.</p>',
            'is_published' => true,
        ]);
    }
}
