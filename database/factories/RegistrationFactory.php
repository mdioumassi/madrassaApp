<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Registration>
 */
class RegistrationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'child_id' => \App\Models\Child::factory(),
            'level_id' => \App\Models\Level::factory(),
            'adult_id' => \App\Models\User::factory(),
            'registration_date' => $this->faker->date(),
            'payment_date' => $this->faker->date(),
            'payment_amount' => $this->faker->randomFloat(2, 0, 1000),
            'payment_method' => $this->faker->word(),
            'payment_comment' => $this->faker->sentence(),
            'payment_status' => $this->faker->word(),
            'registration_status' => $this->faker->word(),
        ];
    }
}
