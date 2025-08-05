<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
           PageSeeder::class,
            ServiceSeeder::class,
            UserSeeder::class,
        ]);
    }
}
