<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleToreadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_toreads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('clientId');
            $table->foreignId('articleId');
            $table->timestamps();
            
            $table->foreign('articleId')->references('id')->on('articles');
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
        Schema::dropIfExists('article_toreads');
    }
}
