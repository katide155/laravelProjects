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
			'company_type' => $this->faker->randomLetter(),
			'company_description' => $this->faker->word(),
         
        ];
    }
}
