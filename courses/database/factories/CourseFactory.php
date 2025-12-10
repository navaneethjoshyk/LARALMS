<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Course>
 */
class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition(): array
    {
        return [
            'code'        => strtoupper($this->faker->bothify('HTTP5##')), // e.g. HTTP5225
            'title'       => $this->faker->sentence(3),                    // e.g. "Web Programming Basics"
            'description' => $this->faker->paragraph(),
            'credits'     => $this->faker->numberBetween(1, 5),
        ];
    }
}
