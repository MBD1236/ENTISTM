<?php

namespace Database\Factories;

use App\Models\Etudiant; // Remplacez avec votre model path
use Faker\Factory;
use Illuminate\Database\Eloquent\Factories\Factory as LaravelFactory;

class EtudiantFactory extends LaravelFactory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Etudiant::class; // Remplacez avec votre model path

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $faker = Factory::create();

        return [
            'nom' => $faker->lastName,
            'prenom' => $faker->firstName,
            'telephone' => $faker->unique()->phoneNumber,
            'email' => $faker->unique()->safeEmail,
            'pv' => $faker->unique()->randomNumber(12), // Ensure 12-digit PV
            'ine' => $faker->unique()->numerify('##########'), // Corrected INE generation: 8-digit fixed length
            'session' => $faker->year,
            'profil' => $faker->randomElement(['Etudiant', 'Etudiante']),
            'centre' => $faker->city,
            'ecoleorigine' => $faker->word,
            'datenaissance' => $faker->date,
            'lieunaissance' => $faker->city,
            'pere' => $faker->lastName,
            'mere' => $faker->lastName,
            'programme' => $faker->randomElement(['Informatique', 'Droit', 'Economie']),
            'nomtuteur' => $faker->lastName . ' (Tuteur)', // Optional tutor name
            'telephonetuteur' => $faker->unique()->phoneNumber, // Optional unique tutor phone
            'adresse' => $faker->address,
            'photo' => $faker->imageUrl(640, 480), // Optional placeholder image
            'diplome' => $faker->text, // Optional diploma content
            'relevenotes' => $faker->text, // Optional notes content
            'certificatnationalite' => $faker->text, // Optional certificate content
            'certificatmedical' => $faker->text, // Optional certificate content
            'extraitnaissance' => $faker->text, // Optional extract content,
        ];
    }
}
