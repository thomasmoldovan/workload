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
        Promotion::create(['name' => 'CPI A1',        'promotion_type_id' => 3, 'presence_weeks' => 13, 'presence_days' => 2, 'enterprise_weeks' => 36, 'enterprise_days' => 0.5]);
        Promotion::create(['name' => 'CP1 A2 G',      'promotion_type_id' => 2, 'presence_weeks' => 14, 'presence_days' => 2, 'enterprise_weeks' => 38, 'enterprise_days' => 0.5]);
        Promotion::create(['name' => 'CPI A2 I',      'promotion_type_id' => 2, 'presence_weeks' => 22, 'presence_days' => 2, 'enterprise_weeks' => 30, 'enterprise_days' => 0.5]);
        Promotion::create(['name' => 'FISA G 20-23',  'promotion_type_id' => 1, 'presence_weeks' => 12, 'presence_days' => 1, 'enterprise_weeks' => 21, 'enterprise_days' => 0.5]);
        Promotion::create(['name' => 'FISA G 21-24',  'promotion_type_id' => 1, 'presence_weeks' => 23, 'presence_days' => 1, 'enterprise_weeks' => 29, 'enterprise_days' => 0.5]);
        Promotion::create(['name' => 'FISA G 22-25',  'promotion_type_id' => 1, 'presence_weeks' => 24, 'presence_days' => 1, 'enterprise_weeks' => 15, 'enterprise_days' => 0.125]);
        Promotion::create(['name' => 'FISA I 21-24',  'promotion_type_id' => 1, 'presence_weeks' => 18, 'presence_days' => 1, 'enterprise_weeks' => 15, 'enterprise_days' => 0.125]);
        Promotion::create(['name' => 'FISA I 22-25',  'promotion_type_id' => 1, 'presence_weeks' => 24, 'presence_days' => 1, 'enterprise_weeks' => 15, 'enterprise_days' => 0.125]);
        Promotion::create(['name' => 'FISE G A3',     'promotion_type_id' => 2, 'presence_weeks' => 18, 'presence_days' => 1, 'enterprise_weeks' => 15, 'enterprise_days' => 0.125]);
        Promotion::create(['name' => 'FISE G A4',     'promotion_type_id' => 2, 'presence_weeks' => 17, 'presence_days' => 1, 'enterprise_weeks' => 25, 'enterprise_days' => 0.125]);
        Promotion::create(['name' => 'FISE I A3',     'promotion_type_id' => 2, 'presence_weeks' => 23, 'presence_days' => 1, 'enterprise_weeks' => 25, 'enterprise_days' => 0.25]);
        Promotion::create(['name' => 'FISE I A4',     'promotion_type_id' => 2, 'presence_weeks' => 20, 'presence_days' => 1, 'enterprise_weeks' => 25, 'enterprise_days' => 0.25]);
        Promotion::create(['name' => 'FISE I A5',     'promotion_type_id' => 2, 'presence_weeks' => 14, 'presence_days' => 1, 'enterprise_weeks' => 39, 'enterprise_days' => 0.125]);
        Promotion::create(['name' => 'CPFIA A1 QSE',  'promotion_type_id' => 1, 'presence_weeks' => 23, 'presence_days' => 1, 'enterprise_weeks' => 25, 'enterprise_days' => 0.25]);
        Promotion::create(['name' => 'CPFIA A2 QSE',  'promotion_type_id' => 1, 'presence_weeks' => 14, 'presence_days' => 3, 'enterprise_weeks' => 40, 'enterprise_days' => 0.25]);
        Promotion::create(['name' => 'RQSE',          'promotion_type_id' => 1, 'presence_weeks' => 42, 'presence_days' => 2, 'enterprise_weeks' => 0,  'enterprise_days' => 0]);
        Promotion::create(['name' => 'CPFIA A1 GMSI', 'promotion_type_id' => 1, 'presence_weeks' => 24, 'presence_days' => 1, 'enterprise_weeks' => 15, 'enterprise_days' => 0.125]);
        Promotion::create(['name' => 'FIFC',          'promotion_type_id' => 1, 'presence_weeks' => 24, 'presence_days' => 1, 'enterprise_weeks' => 15, 'enterprise_days' => 0.125]);
        Promotion::create(['name' => 'MS',            'promotion_type_id' => 2, 'presence_weeks' => 24, 'presence_days' => 1, 'enterprise_weeks' => 31, 'enterprise_days' => 0.125]);
    }
}
