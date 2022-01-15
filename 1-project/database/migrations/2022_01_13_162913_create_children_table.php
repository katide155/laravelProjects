<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildrenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('children', function (Blueprint $table) {
            $table->id();
			$table->string('child_name');
			$table->string('child_surname');
			$table->bigInteger('child_group_id');
			$table->string('child_parents_email');
			$table->string('child_parents_telno');
			$table->date('child_birthdate');
			$table->date('deleted_at')->nullable()->default(null);;
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
        Schema::dropIfExists('children');
    }
}
