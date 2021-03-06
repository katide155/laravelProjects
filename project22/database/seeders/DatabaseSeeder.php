<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CompanyType;
use App\Models\Client;
use App\Models\Company;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * php artisan migrate:fresh --seed
     * @return void
     */
    public function run()
    {
        //User::factory(10)->create();
		//Client::factory(50)->create();
		//Company::factory(15)->create();
		$this->call([
			CompanyTypeSeeder::class,
            CompanySeeder::class,
			ClientSeeder::class
		]);
    }
}
