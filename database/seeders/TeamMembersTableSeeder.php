<?php

// database/seeders/TeamMembersTableSeeder.php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMembersTableSeeder extends Seeder
{
    public function run(): void
    {
        TeamMember::truncate(); // Очищаем таблицу перед заполнением

        TeamMember::create([
            'name' => 'Елена Сергеева',
            'role' => 'Руководитель отдела ИТ',
            'photo_path' => '/team/elena.png',
            'order' => 2,
            'social_links' => [
                ['type' => 'telegram', 'url' => '#'],
                ['type' => 'email', 'url' => 'mailto:elena@karjalatech.ru'],
            ],
        ]);

        TeamMember::create([
            'name' => 'Андрей Романов',
            'role' => 'СТО',
            'photo_path' => '/team/andrew.jpg',
            'order' => 1,
            'social_links' => [
                ['type' => 'telegram', 'url' => '#'],
                ['type' => 'email', 'url' => 'mailto:andrew@karjalatech.ru'],
            ],
        ]);

        TeamMember::create([
            'name' => 'Данила Филькин',
            'role' => 'Специалист 1С',
            'photo_path' => '/team/danila.png',
            'order' => 3,
            'social_links' => [
                ['type' => 'telegram', 'url' => '#'],
                ['type' => 'email', 'url' => 'mailto:danila@karjalatech.ru'],
            ],
        ]);

        TeamMember::create([
            'name' => 'Валерия Брызгалова',
            'role' => 'Техническая поддержка',
            'photo_path' => '/team/lera.png',
            'order' => 3,
            'social_links' => [
                ['type' => 'telegram', 'url' => '#'],
                ['type' => 'email', 'url' => 'mailto:lera@karjalatech.ru'],
            ],
        ]);
    }
}
