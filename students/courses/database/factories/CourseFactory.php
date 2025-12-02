<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fname' => $this->faker->firstName(),
            'lname' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'course' => $this->faker->word(),
        ];
    }
}
