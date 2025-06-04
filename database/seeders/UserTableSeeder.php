<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newUser = new User();

        $newUser->name = 'Mattia Natella';
        $newUser->email = 'mattianatella@gmail.it';
        $newUser->password = 'mattianatella';

        $newUser->save();

    }
}
