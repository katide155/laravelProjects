<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
		
   			'alt' => 'pvz',
			'src' => 'pvz.png',
			'width' => 100,
			'height' => 30,
			'class' => null,

        ];
    }
}
