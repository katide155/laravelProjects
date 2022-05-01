<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_accounts', function (Blueprint $table) {
            $table->id();
			$table->string('account_number');
			$table->string('account_title');
			$table->boolean('grouped_account')->nullable()->default(null);
			$table->unsignedBigInteger('account_type_id')->nullable()->default(null);
			$table->foreign('account_type_id')->references('id')->on('account_types');
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
        Schema::dropIfExists('plan_accounts');
    }
}
