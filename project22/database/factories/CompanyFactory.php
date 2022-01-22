<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
         return [
            'company_name' => $this->faker->company(),
			'company_type_id' => rand(1,2),
			'company_description' => $this->faker->paragraph(15),
        ];
    }
}
