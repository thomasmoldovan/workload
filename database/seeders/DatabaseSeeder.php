<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => '$2y$10$K9m1Pc/XJv.7Av6MhzXS5e4wHCVIHkv6iOOx4OuKAZuGIyEFTBL6u',
        ]);
    }
}
