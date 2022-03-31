<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
			$table->string('client_name');
			$table->string('client_surname');
			$table->string('client_username');
			$table->string('client_type');
			$table->unsignedBigInteger('client_number');
			$table->string('client_pvmnumber');
			$table->unsignedBigInteger('client_company_id');//galibūti tik teigiami
			$table->string('client_name');
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
        Schema::dropIfExists('clients');
    }
}
