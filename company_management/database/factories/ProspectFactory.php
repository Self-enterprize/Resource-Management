<?php

namespace Database\Factories;

use App\Models\Prospect;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProspectFactory extends Factory
{
    protected $model = Prospect::class;

    // Returns a phone number with 9 characters.

    /**
     * @throws Exception
     */
    public function phoneNumberGenerator() {
        $phoneNumber = '69';
        for($i = 1; $i<7; $i++) {
            $phoneNumber .= random_int(1,9);
        }

        return $phoneNumber;
    }
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'agent_id' => 5,
            'school_id' => $this->faker->numberBetween(1,3),
            'name' => $this->faker->name(),
            'surname' => $this->faker->lastName(),
            'phoneNumber' => $this->phoneNumberGenerator(),
            'email' => $this->faker->email(),
            'status' => $this->faker->randomElement(['pending', 'accepted']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
