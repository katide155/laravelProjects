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
            $table->string('name');
            $table->string('surname');
            $table->longText('description');
			$table->string('company_title');
			$table->string('api_client_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * php artisan migrate:refresh --path=/database/migrations/2022_03_21_122945_create_clients_table.php
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
