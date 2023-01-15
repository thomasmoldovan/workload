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
        Promotion::create(['name' => 'CPI A1',        'promotion_type_id' => 3]);
        Promotion::create(['name' => 'CP1 A2 G',      'promotion_type_id' => 2]);
        Promotion::create(['name' => 'CPI A2 I',      'promotion_type_id' => 2]);
        Promotion::create(['name' => 'FISA G 20-23',  'promotion_type_id' => 1]);
        Promotion::create(['name' => 'FISA G 21-24',  'promotion_type_id' => 1]);
        Promotion::create(['name' => 'FISA G 22-25',  'promotion_type_id' => 1]);
        Promotion::create(['name' => 'FISA I 21-24',  'promotion_type_id' => 1]);
        Promotion::create(['name' => 'FISA I 22-25',  'promotion_type_id' => 1]);
        Promotion::create(['name' => 'FISE G A3',     'promotion_type_id' => 2]);
        Promotion::create(['name' => 'FISE G A4',     'promotion_type_id' => 2]);
        Promotion::create(['name' => 'FISE I A3',     'promotion_type_id' => 2]);
        Promotion::create(['name' => 'FISE I A4',     'promotion_type_id' => 2]);
        Promotion::create(['name' => 'FISE I A5',     'promotion_type_id' => 2]);
        Promotion::create(['name' => 'CPFIA A1 QSE',  'promotion_type_id' => 1]);
        Promotion::create(['name' => 'CPFIA A2 QSE',  'promotion_type_id' => 1]);
        Promotion::create(['name' => 'RQSE',          'promotion_type_id' => 1]);
        Promotion::create(['name' => 'CPFIA A1 GMSI', 'promotion_type_id' => 1]);
        Promotion::create(['name' => 'FIFC',          'promotion_type_id' => 1]);
        Promotion::create(['name' => 'MS',            'promotion_type_id' => 2]);
    }
}
