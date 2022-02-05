<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->lexify('????????? product'),
			'description' => $this->faker->paragraph(15),
			'price' => $this->faker->randomFloat(2, 0.01, 300),
			'category_id' => $this->faker->numberBetween(1, 3),
			'image_url' => $this->faker->imageUrl(),
			'image_id' => 1,
        ];
    }
}
