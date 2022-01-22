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
        return [
            'client_name' => $this->faker->firstName(),
			'client_surname' => $this->faker->lastName(),
			'client_username' => $this->faker->userName(),
			'client_company_id' => $this->faker->numberBetween(1, 20),
			'client_image_url' => $this->faker->imageUrl(),
          
        ];
    }
}
