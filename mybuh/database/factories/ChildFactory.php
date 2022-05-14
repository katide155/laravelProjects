<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class ChildFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'child_name' => $this->faker->firstName(),
			'child_surname' => $this->faker->lastName(),
			'child_group_id' => $this->faker->numberBetween(1, 5),
			'child_parents_email' => $this->faker->email(),
			'child_parents_telno' => $this->faker->phoneNumber(),
			'child_birthdate' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
			'deleted_at' => null,
        ];
    }
}
