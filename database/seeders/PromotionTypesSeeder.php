<?php

namespace Database\Seeders;

use App\Models\PromotionType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PromotionTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PromotionType::create(['name' => 'Type 1']);
        PromotionType::create(['name' => 'Type 2']);
        PromotionType::create(['name' => 'Type 3']);
    }
}
