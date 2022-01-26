<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AttendanceGroupFactory extends Factory
{
	
	public function groupDifficultyLevel(){
		
		$level = array(
			 'Begginer',
			  'Middle',
			 'Advanced'
		);

		$getRandLevel = array_rand($level,1);
		
		return $level[$getRandLevel];
	}
	
	
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'attendance_group_name' => $this->faker->lexify('???? group'),
			'attendance_group_description' => $this->faker->paragraph(15),
			'attendance_group_difficulty' => $this->groupDifficultyLevel(),
			'attendance_group_school_id' => rand(1,15),
			'attendance_group_logo' => $this->faker->imageUrl(640, 480, 'animals', true),
        ];
    }
}
