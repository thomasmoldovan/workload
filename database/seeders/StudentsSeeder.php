<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::create(['workload_id' => 1, 'colaborator_id' => 1, 'promotion_id' => 1]);
        Student::create(['workload_id' => 1, 'colaborator_id' => 1, 'promotion_id' => 2]);
        Student::create(['workload_id' => 1, 'colaborator_id' => 1, 'promotion_id' => 3]);
        Student::create(['workload_id' => 1, 'colaborator_id' => 1, 'promotion_id' => 4]);
    }
}
