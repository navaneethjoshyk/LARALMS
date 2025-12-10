<?php

namespace Database\Factories;

use App\Models\Professor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Professor>
 */
class ProfessorFactory extends Factory
{
    protected $model = Professor::class;

    public function definition(): array
    {
        return [
            'fname'      => $this->faker->firstName(),
            'lname'      => $this->faker->lastName(),
            'email'      => $this->faker->unique()->safeEmail(),
            'department' => $this->faker->randomElement([
                'Computer Science',
                'Mathematics',
                'Business',
                'Design',
                'Engineering',
            ]),
        ];
    }
}
