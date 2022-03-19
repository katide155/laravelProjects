<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

		
        return [
            'title' => $this->faker->firstName(),
            'alt' => $this->faker->firstName(),
			'url' => $this->faker->imageUrl(),
            'description' => $this->faker->paragraphs(1, true) 
        ];
    }
}
