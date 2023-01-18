<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::create(['name' => 'Administration du Sy']);
        Project::create(['name' => 'Algorithmique avancé']);
        Project::create(['name' => 'Big data']);
        Project::create(['name' => 'Chimie des matériaux']);
        Project::create(['name' => 'Conception et progra']);
        Project::create(['name' => 'Conception mécanique']);
        Project::create(['name' => 'Corelly']);
        Project::create(['name' => 'Développement web']);
        Project::create(['name' => 'Electricité et asser']);
        Project::create(['name' => 'Electronique']);
        Project::create(['name' => 'Electrotechnique']);
        Project::create(['name' => 'Environnement et éth']);
        Project::create(['name' => 'ETS']);
        Project::create(['name' => 'Etude des fonctions']);
        Project::create(['name' => 'Industrie']);
        Project::create(['name' => 'Industrie du Futur']);
        Project::create(['name' => 'Innovation']);
        Project::create(['name' => 'Management de projet']);
        Project::create(['name' => 'Maquette numérique']);
        Project::create(['name' => 'Mécanique']);
        Project::create(['name' => 'Mécanique des fluide']);
        Project::create(['name' => 'Modélisation et base']);
        Project::create(['name' => 'Modélisation numériq']);
        Project::create(['name' => 'Performance énergéti']);
        Project::create(['name' => 'PFI']);
        Project::create(['name' => 'Programmation Systèm']);
        Project::create(['name' => 'Réseaux & Système']);
        Project::create(['name' => 'Séminaire intégratio']);
        Project::create(['name' => 'Séminaire scientifiq']);
        Project::create(['name' => 'Statistiques appliqu']);
        Project::create(['name' => 'Systèmes automatisés']);
        Project::create(['name' => 'Systèmes embarqués']);
        Project::create(['name' => 'Traitement du signal']);
        Project::create(['name' => 'Vieux pont']);
        Project::create(['name' => 'Ville du futur']);
        Project::create(['name' => 'Ville Durable']);
    }
}
