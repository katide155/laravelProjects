<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     * 
     * @return array
     */
    public function definition()//funkcija pagal instrukcijas gamina DB įrašus
    {
        return [
            'group_title' => $this->faker->lexify('???????????'),
			'group_number' => $this->faker->numberBetween(0, 15),
			'deleted_at' => null,
        ];
    }
}
