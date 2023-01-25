<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Settings::create(["name" => "HOURS_PER_DAY", "type" => "float", "value" => "7.8"]);
        Settings::create(["name" => "DAYS_PER_WEEK", "type" => "int", "value" => "5"]);
        Settings::create(["name" => "TEMPS_PILOTAJ_PROJET", "type" => "float", "value" => "0.4"]);
        Settings::create(["name" => "TOTAL_DAYS", "type" => "int", "value" => "210"]);

    }
}
