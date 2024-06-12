<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Level>
 */
class LevelFactory extends Factory
{
    protected $model = \App\Models\Level::class;
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'label' => $this->faker->sentence(3),
            'comment' => $this->faker->paragraph,
            'slug' => $this->faker->slug,
            'tarif' => $this->faker->randomFloat(2, 0, 999),
            'registration_fees' => $this->faker->randomFloat(2, 0, 999),
            'hours' => $this->faker->randomNumber(2),
        ];
    }
}
