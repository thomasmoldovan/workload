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
        Student::create(['workload_id' => 1, 'colaborator_id' => 1, 'promotion_id' => 1, "nr_students" => random_int(1, 50), "temporary" => false]);
        Student::create(['workload_id' => 1, 'colaborator_id' => 1, 'promotion_id' => 2, "nr_students" => random_int(1, 50), "temporary" => false]);
        Student::create(['workload_id' => 1, 'colaborator_id' => 1, 'promotion_id' => 3, "nr_students" => random_int(1, 50), "temporary" => false]);
        Student::create(['workload_id' => 1, 'colaborator_id' => 1, 'promotion_id' => 4, "nr_students" => random_int(1, 50), "temporary" => false]);

        Student::create(['workload_id' => 1, 'colaborator_id' => 8, 'promotion_id' => 1, "nr_students" => random_int(1, 50), "temporary" => false]);
        Student::create(['workload_id' => 1, 'colaborator_id' => 8, 'promotion_id' => 2, "nr_students" => random_int(1, 50), "temporary" => false]);
        Student::create(['workload_id' => 1, 'colaborator_id' => 8, 'promotion_id' => 3, "nr_students" => random_int(1, 50), "temporary" => false]);
    }
}
