<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SchoolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'school_name' => $this->faker->company(),
			'school_description' => $this->faker->paragraph(15),
			'school_place' => $this->faker->company(),
			'school_phone' => $this->faker->company(),
			
        ];
    }
}
