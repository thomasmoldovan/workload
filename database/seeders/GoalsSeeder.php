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
        Goal::create(['workload_id' => 1, 'colaborator_id' => 1, 'promotion_id' => 1, "nr_students" => random_int(1, 50), "temporary" => false]);
        Goal::create(['workload_id' => 1, 'colaborator_id' => 1, 'promotion_id' => 2, "nr_students" => random_int(1, 50), "temporary" => false]);
        Goal::create(['workload_id' => 1, 'colaborator_id' => 1, 'promotion_id' => 3, "nr_students" => random_int(1, 50), "temporary" => false]);
        Goal::create(['workload_id' => 1, 'colaborator_id' => 1, 'promotion_id' => 4, "nr_students" => random_int(1, 50), "temporary" => false]);
    }
}
