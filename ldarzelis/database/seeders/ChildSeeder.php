<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Child;

class ChildSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=ChildSeeder
     * @return void
     */
    public function run()
    {
           Child::factory(30)->create();
    }
}
