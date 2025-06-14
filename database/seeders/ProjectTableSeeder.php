<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;



class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i <= 5; $i++) {

            $newProject = new Project();

            $newProject->name = $faker->word();
            $newProject->customer = $faker->company();
            $newProject->start_date = $faker->date();
            $newProject->summary = $faker->paragraph(3);
            $newProject->type_id = rand(1, 5);


            $newProject->save();
        }

    }
}
