<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("client_id");

            $table->unsignedBigInteger("done_by_id");

            $table->integer("rating");

            $table->longText("comment")->nullable();

            $table->timestamps();



            $table->foreign("client_id")->references("id")
                ->on("clients");

            $table->foreign("done_by_id")->references("id")
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
        Schema::dropIfExists('ratings');
    }
}
