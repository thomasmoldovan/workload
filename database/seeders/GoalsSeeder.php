<?php

namespace Database\Seeders;

use App\Models\Goal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GoalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Goal::create(['workload_id' => 1, 'colaborator_id' => 1, 'promotion_id' => 1, "temporary" => false]);
        Goal::create(['workload_id' => 1, 'colaborator_id' => 1, 'promotion_id' => 2, "temporary" => false]);
        Goal::create(['workload_id' => 1, 'colaborator_id' => 1, 'promotion_id' => 3, "temporary" => false]);
        Goal::create(['workload_id' => 1, 'colaborator_id' => 1, 'promotion_id' => 4, "temporary" => false]);
        
        Goal::create(['workload_id' => 1, 'colaborator_id' => 8, 'promotion_id' => 2, "temporary" => false]);
        Goal::create(['workload_id' => 1, 'colaborator_id' => 8, 'promotion_id' => 4, "temporary" => false]);
    }
}
