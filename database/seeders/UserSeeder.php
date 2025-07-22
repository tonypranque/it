<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Проверяем, что мы в среде разработки
        if (!app()->environment('local', 'dev')) {
            return;
        }

        // Создаем тестового администратора
        User::create([
            'name' => 'Admin User',
            'email' => 'sergeevanton1109@gmail.com',
            'password' => Hash::make('12345678'),
            'email_verified_at' => now(),
        ]);
    }
}
