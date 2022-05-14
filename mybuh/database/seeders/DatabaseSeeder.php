<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AccountType;
use App\Models\Group;
use App\Models\Child;

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
			AccountTypeSeeder::class,
			GroupSeeder::class,
			ChildSeeder::class
		]);
    }
}
