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
            $table->string('coverPicture');
            $table->longText('content');
            $table->foreignId('categoryId');
            $table->foreignId('clientId');
            $table->smallInteger('integer')->default(0);
            $table->timestamps();
            $table->foreign('categoryId')->references('id')->on('article_categories');
            $table->foreign("clientId")->references("id")->on("clients");
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
