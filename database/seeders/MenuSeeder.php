<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('menus')->insert([
                'nom' => $faker->words(3, true), // Génère un nom de menu
                'description' => $faker->sentence(), // Génère une description
                'prix' => $faker->randomFloat(2, 5, 50), // Génère un prix aléatoire entre 5 et 50
                'image' => 'https://picsum.photos/200/300?random=' . $i, // Génère une URL d'image aléatoire
            ]);
        }
    }
}
