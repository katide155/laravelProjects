<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'student_name' => $this->faker->firstName(),
			'student_surname' => $this->faker->lastName(),
			'student_attendance_group_id' => $this->faker->numberBetween(1, 30),
			'student_image_url' => $this->faker->imageUrl(),
        ];
    }
}
