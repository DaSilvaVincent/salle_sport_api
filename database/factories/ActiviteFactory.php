<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activite>
 */
class ActiviteFactory extends Factory {

    const SPORT = ['Danse', 'Arts Martiaux', 'Fitness', 'Musculation', 'Running',
        'Padel Tennis', 'Tennis', 'Squash', 'Badminton', 'PickleBall', 'FutSal', 'Five'];
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() {
        return [
            'sport' => $this->faker->  randomElement(self::SPORT),
            'localisation' => sprintf("Espace-%d", $this->faker-> numberBetween(1,5)),
            'disponibilites' => ["date"=> "2023-03-06","dispo"=> [8,9,10,11,12,13,14,15,16,17,18,19]],
            'cout' => $this->faker->numberBetween(10,100)
        ];
    }
}
