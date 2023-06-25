<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FormateursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('fr_FR'); // Utilisez le locale français pour générer des données de base

        $formateurs = [];

        for ($i = 0; $i < 10; $i++) { // Génère 10 enregistrements de données fictives
            $formateurs[] = [
                'name' => $faker->name,
                'tel' => $this->generateTunisianPhoneNumber($faker),
                'email' => $faker->email,
                'adresse' => $faker->address,
                'specialite' => $faker->jobTitle,
                'experience' => $faker->numberBetween(1, 20),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('formateurs')->insert($formateurs);
    }

    private function generateTunisianPhoneNumber($faker)
    {
        // Génère un numéro de téléphone tunisien fictif au format local
        $prefixes = ['20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '50', '51', '52', '53', '54', '55', '56', '57', '58', '59'];

        $phoneNumber = $faker->randomElement($prefixes) . $faker->numberBetween(100000, 999999);

        return '+216' . $phoneNumber;
    }
    
}
