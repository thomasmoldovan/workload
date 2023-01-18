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
        PromotionType::create(['name' => 'VEP + EI + VED', 've_present' => 4, 've_distance' => 1.5, 'ei' => 2, 'ss_present' => 0, 'ss_distance' => 0]);
        PromotionType::create(['name' => 'VEP + EI',       've_present' => 4, 've_distance' => 1.5, 'ei' => 0, 'ss_present' => 0, 'ss_distance' => 0]);
        PromotionType::create(['name' => 'EI',             've_present' => 0, 've_distance' => 0,   'ei' => 2, 'ss_present' => 0, 'ss_distance' => 0]);
    }
}
