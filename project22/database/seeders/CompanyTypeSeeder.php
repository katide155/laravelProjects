<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('company_types')->insert([
            'company_type_name'=>'Mažoji bendrija',
            'company_type_short_name'=>'MB',
            'company_type_description'=>'ribota atsakomybė'
        ]);
        DB::table('company_types')->insert([
            'company_type_name'=>'Akcinė bendrovė',
            'company_type_short_name'=>'AB',
            'company_type_description'=>'ribota atsakomybė'
        ]);
    }
}
