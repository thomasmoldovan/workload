<?php

namespace Database\Seeders;

use App\Models\Promotion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PromotionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Promotion::create(['name' => 'CPI A1']);
        Promotion::create(['name' => 'CP1 A2 G']);
        Promotion::create(['name' => 'CPI A2 I']);
        Promotion::create(['name' => 'FISA G 20-23']);
        Promotion::create(['name' => 'FISA G 21-24']);
        Promotion::create(['name' => 'FISA G 22-25']);
        Promotion::create(['name' => 'FISA I 21-24']);
        Promotion::create(['name' => 'FISA I 22-25']);
        Promotion::create(['name' => 'FISE G A3']);
        Promotion::create(['name' => 'FISE G A4']);
        Promotion::create(['name' => 'FISE I A3']);
        Promotion::create(['name' => 'FISE I A4']);
        Promotion::create(['name' => 'FISE I A5']);
        Promotion::create(['name' => 'CPFIA A1 QSE']);
        Promotion::create(['name' => 'CPFIA A2 QSE']);
        Promotion::create(['name' => 'RQSE']);
        Promotion::create(['name' => 'CPFIA A1 GMSI']);
        Promotion::create(['name' => 'FIFC']);
        Promotion::create(['name' => 'MS']);
    }
}
