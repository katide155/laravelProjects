<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
		$test_data = [
			'Franecki PLC',
			'Green PLC',
			'Kutch and Carroll'
		];
        // \App\Models\User::factory(10)->create();
		//\App\Models\Company::factory(10)->create();
		for($i=0; $i<3; $i++){
			DB::table('companies')->insert([
				'title' => $test_data[$i],
				'contact' => 'contact'.$i
			]);
		};
    }
}
