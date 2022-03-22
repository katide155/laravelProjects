<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
		
		$test_data = [
			'Franecki PLC',
			'Green PLC',
			'Kutch and Carroll'
		];
		
       return [
            'name' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
            'description' => $this->faker->paragraphs(3, true),
			'company_title' => $test_data[rand(0,2)]
        ];
    }
}
