<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AttendanceGroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'attendance_group_name' => $this->faker->lexify('???? group'),
			'attendance_group_description' => $this->faker->paragraph(15),
			'attendance_group_difficulty' => $this->faker->randomElements(['Hard', 'Middle', 'Easy']),
			'attendance_group_school_id' => rand(1,15),
        ];
    }
}
