<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientArticleInterestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_article_interests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('clientId');
            $table->foreignId('categoryId');
            $table->timestamps();
            
            $table->foreign('categoryId')->references('id')->on('article_categories');
            $table->foreign("clientId")->references("id")
                ->on("clients");
        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_article_interests');
    }
}
