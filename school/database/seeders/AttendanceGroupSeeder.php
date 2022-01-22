<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AttendanceGroup;

class AttendanceGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            AttendanceGroup::factory()
            ->count(30)
            ->create();
    }
}
