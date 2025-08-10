<?php



namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run()
    {
        Settings::create([
            'phone' => '+7 (8142) 28-87-45',
            'email' => 'cto@karjalatech.ru',
            'address' => 'г. Петрозаводск, ул. Красная д. 4',
            'tg_username' => 'https://t.me',
            'vk_username' => 'https://vk.com',
        ]);
    }
}
