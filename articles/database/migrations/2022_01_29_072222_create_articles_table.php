<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
			$table->string('title');
			$table->text('excerpt');
			$table->longText('description');
			$table->unsignedBigInteger('author_id');
			$table->foreign('author_id')->references('id')->on('authors');
			$table->unsignedBigInteger('article_image_id')->nullable()->default(null);
			$table->foreign('article_image_id')->references('id')->on('article_images');			
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
        Schema::dropIfExists('articles');
    }
}
