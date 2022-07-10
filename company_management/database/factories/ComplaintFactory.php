<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ComplaintFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sender_id' => 5,
            'title' => $this->faker->realTextBetween(50, 80),
            'message' => $this->faker->sentence(),
            'status' => $this->faker->randomElement(['pending', 'validate', 'non_validate']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
