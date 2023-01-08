<?php

namespace Database\Seeders;

use App\Models\Workload;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkloadsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Workload::create(['colaborator_id' => 1, 'name' => 'Default']);
    }
}
