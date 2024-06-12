<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Child>
 */
class ChildFactory extends Factory
{
    protected $model = \App\Models\Child::class;
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstname' => fake()->name(),
            'lastname' => fake()->name(),
            'birthdate' => fake()->date(),
            'genre' => fake()->randomElement(['M', 'F']),
            'french_class' => fake()->randomElement(['CP', 'CE1', 'CE2', 'CM1', 'CM2']),
        ];
    }
}
