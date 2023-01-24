<?php

namespace Database\Seeders;

use App\Models\Delivery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeliveriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Delivery::create(['workload_id' => 1, 'colaborator_id' => 1, 'project_id' => 1, "nr_hours" => random_int(1, 50), "temporary" => false]);
        Delivery::create(['workload_id' => 1, 'colaborator_id' => 1, 'project_id' => 2, "nr_hours" => random_int(1, 50), "temporary" => false]);
        Delivery::create(['workload_id' => 1, 'colaborator_id' => 1, 'project_id' => 3, "nr_hours" => random_int(1, 50), "temporary" => false]);
        Delivery::create(['workload_id' => 1, 'colaborator_id' => 1, 'project_id' => 4, "nr_hours" => random_int(1, 50), "temporary" => false]);

        Delivery::create(['workload_id' => 1, 'colaborator_id' => 8, 'project_id' => 27, "nr_hours" => 4, "temporary" => false]);
        Delivery::create(['workload_id' => 1, 'colaborator_id' => 8, 'project_id' => 21, "nr_hours" => 8, "temporary" => false]);
    }
}
