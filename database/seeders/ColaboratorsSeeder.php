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
        Colaborator::create(['surname' => 'BACILA',   'lastname' => 'Adriana',  'trigramme' => 'ABA']);
        Colaborator::create(['surname' => 'BOUCHET',  'lastname' => 'Romain',   'trigramme' => 'RBT']);
        Colaborator::create(['surname' => 'SOURISSE', 'lastname' => 'Arnaud',   'trigramme' => 'ASE']);
        Colaborator::create(['surname' => 'GUIGOT',   'lastname' => 'Corentin', 'trigramme' => 'CGT']);
        Colaborator::create(['surname' => 'TREGARO',  'lastname' => 'Anthony',  'trigramme' => 'ATO']);
        Colaborator::create(['surname' => 'HUET',     'lastname' => 'Benoît',   'trigramme' => 'BHT']);
        Colaborator::create(['surname' => 'FOURNIER', 'lastname' => 'Rémy',     'trigramme' => 'RFR']);
        Colaborator::create(['surname' => 'LITARD',   'lastname' => 'Patrick',  'trigramme' => 'PLD']);
        Colaborator::create(['surname' => 'COLLET',   'lastname' => 'Elodie',   'trigramme' => 'ECT']);
        Colaborator::create(['surname' => 'GAUDON',   'lastname' => 'Anne',     'trigramme' => 'AGN']);
        Colaborator::create(['surname' => 'GALLET',   'lastname' => 'Jérémy',   'trigramme' => 'JGT']);
        Colaborator::create(['surname' => 'VASNIER',  'lastname' => 'Jean',     'trigramme' => 'JVR']);
        Colaborator::create(['surname' => 'SAUPIN',   'lastname' => 'Isabelle', 'trigramme' => 'ISN']);
    }
}
