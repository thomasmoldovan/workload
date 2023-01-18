<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
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
        User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => '$2y$10$K9m1Pc/XJv.7Av6MhzXS5e4wHCVIHkv6iOOx4OuKAZuGIyEFTBL6u',
        ]);

        $this->call([
            ColaboratorsSeeder::class,
            PromotionTypesSeeder::class,
            PromotionsSeeder::class,
            WorkloadsSeeder::class,
            StudentsSeeder::class,
            GoalsSeeder::class,
            ProjectsSeeder::class,
            DeliveriesSeeder::class,
            SettingsSeeder::class,
        ]);
    }
}
