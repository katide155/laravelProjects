<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     * lentele turinti migraciją turi būti saraso pabaigoje, reikia pervadinti!!!
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
			$table->string('client_name');
			$table->string('client_surname');
			$table->string('client_username');
			$table->unsignedBigInteger('client_company_id');
			// rysys su companies id (pirmiau stulpelis, po to ryšys)
			$table->foreign('client_company_id')->references('id')->on('companies');
			$table->string('client_image_url');			
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
