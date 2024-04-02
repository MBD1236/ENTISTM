<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GupolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Génération de données fictives
        $faker = \Faker\Factory::create();

        // Populer la table 'gupols'
        for ($i = 0; $i < 10; $i++) {
            DB::table('gupols')->insert([
                'ine' => $faker->unique()->numerify('##########'), // Génère un numéro d'étudiant unique de 10 chiffres
                'nom' => $faker->lastName,
                'prenom' => $faker->firstName,
                'pv' => $faker->numerify('############'), // Génère un numéro de carte d'identité de 12 chiffres
                'ecoleorigine' => $faker->word,
                'centre' => $faker->city,
                'session' => $faker->year(),
                'datenaissance' => $faker->date,
                'lieunaissance' => $faker->city,
                'pere' => $faker->lastName,
                'mere' => $faker->lastName,
                'email' => $faker->email,
                'telephone' => $faker->phoneNumber,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
