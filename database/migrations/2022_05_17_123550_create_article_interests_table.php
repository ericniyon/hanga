<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleInterestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_interests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('articleId');
            $table->foreignId('categoryId');
            $table->timestamps();
            $table->foreign('articleId')->references('id')->on('articles');
            $table->foreign("categoryId")->references("id")
                ->on("article_categories");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_interests');
    }
}
