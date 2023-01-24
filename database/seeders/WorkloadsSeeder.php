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
        for ($i = 0; $i < 13; $i++) {
            Workload::create(['colaborator_id' => $i + 1]);
        }
    }
}
