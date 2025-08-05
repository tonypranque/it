<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        Page::create([
            'title' => 'Политика конфиденциальности',
            'slug' => 'privacy-policy',
            'content' => '<p>Политики кнофиденциальности</p>',
            'is_published' => true,
        ]);
    }
}
