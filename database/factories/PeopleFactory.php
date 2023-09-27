<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\Lorem;

class PeopleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $languages = ['English', 'Spanish', 'French', 'German', 'Chinese', 'Japanese', 'Italian', 'Portuguese', 'Russian', 'Arabic'];
        $interests = ['Archery', 'Boxing', 'Aquascaping', 'Dog Sled Racing', 'Mountain Climbing', 'Gaming'];

        // Use randomElements to select 10 random languages from the array
        $selectedLanguages = $this->faker->randomElements($languages);

        // Use randomElements to select some random interests from the array
        $selectedInterests = $this->faker->randomElements($interests, 3);

        return [
            'user_id' => function () {
                return \App\Models\User::inRandomOrder()->first()->id;
            },
            'name' => $this->faker->name(),
            'surname' => $this->faker->lastName(),
            'id_number' => $this->faker->creditCardNumber(),
            'mobile_number' => $this->faker->phoneNumber(),
            'email' => $this->faker->safeEmail(),
            'language' => implode(', ', $selectedLanguages), // Convert to comma-separated string
            'interests' => implode(', ', $selectedInterests), // Convert to comma-separated string
        ];
    }
}