<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        $types = ['React', 'Laravel', 'GSAP', 'Javascript', 'PHP'];

        foreach ($types as $type) {

            $newType = new Type();
            $newType->name = $type;
            $newType->description = $faker->text();

            $newType->save();
        }

    }
}
