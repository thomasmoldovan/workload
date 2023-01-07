<?php

namespace Database\Seeders;

use App\Models\Colaborator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColaboratorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Colaborator::create(['name' => 'BACILA', 'surname' => 'Adriana', 'trigramme' => 'ABA']);
        Colaborator::create(['name' => 'BOUCHET', 'surname' => 'Romain', 'trigramme' => 'RBT']);
        Colaborator::create(['name' => 'SOURISSE', 'surname' => 'Arnaud', 'trigramme' => 'ASE']);
        Colaborator::create(['name' => 'GUIGOT', 'surname' => 'Corentin', 'trigramme' => 'CGT']);
        Colaborator::create(['name' => 'TREGARO', 'surname' => 'Anthony', 'trigramme' => 'ATO']);
        Colaborator::create(['name' => 'HUET', 'surname' => 'Benoît', 'trigramme' => 'BHT']);
        Colaborator::create(['name' => 'FOURNIER', 'surname' => 'Rémy', 'trigramme' => 'RFR']);
        Colaborator::create(['name' => 'LITARD', 'surname' => 'Patrick', 'trigramme' => 'PLD']);
        Colaborator::create(['name' => 'COLLET', 'surname' => 'Elodie', 'trigramme' => 'ECT']);
        Colaborator::create(['name' => 'GAUDON', 'surname' => 'Anne', 'trigramme' => 'AGN']);
        Colaborator::create(['name' => 'GALLET', 'surname' => 'Jérémy', 'trigramme' => 'JGT']);
        Colaborator::create(['name' => 'VASNIER', 'surname' => 'Jean', 'trigramme' => 'JVR']);
        Colaborator::create(['name' => 'SAUPIN', 'surname' => 'Isabelle', 'trigramme' => 'ISN']);
    }
}
