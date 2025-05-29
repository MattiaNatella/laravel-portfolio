<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newProject = new Project();

        $newProject->name = 'Portfolio';
        $newProject->customer = 'Mattia';
        $newProject->start_date = '2025-05-29';
        $newProject->summary = "Creazione del back-office del mio portfolio, sfruttando il framework Laravel, i model, le migrations, i seeders, i controller, le rotte e l'auth";

        $newProject->save();
    }
}
