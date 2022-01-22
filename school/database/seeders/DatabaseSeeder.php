<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\School;
use App\Models\Student;
use App\Models\AttendanceGroup;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
		
		$this->call([
			SchoolSeeder::class,
			AttendanceGroupSeeder::class,
			StudentSeeder::class
		]);
    }
}
