<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendanceGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance_groups', function (Blueprint $table) {
            $table->id();
			$table->string('attendance_group_name');
			$table->longText('attendance_group_description');
			$table->string('attendance_group_difficulty');
			$table->unsignedBigInteger('attendance_group_school_id');
			$table->foreign('attendance_group_school_id')->references('id')->on('schools');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendance_groups');
    }
}
