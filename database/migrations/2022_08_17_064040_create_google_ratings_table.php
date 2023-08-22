<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoogleRatingsTable extends Migration
{

    public function up()
    {
        Schema::create('google_ratings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("client_id");

            $table->string("rating")->nullable();

            $table->longText("comment")->nullable();

            $table->timestamps();



            $table->foreign("client_id")->references("id")
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
        Schema::dropIfExists('google_ratings');
    }
}
