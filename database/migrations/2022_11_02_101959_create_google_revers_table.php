<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoogleReversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('google_revers', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->nullable();
            $table->string('cuastomer_rating')->nullable();
            $table->text('feedback')->nullable();
            $table->string('review_date')->nullable();
            $table->unsignedBigInteger('google_rating');

            $table->foreign('google_rating')->references('id')->on('google_ratings')->onDelete('cascade');
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
        Schema::dropIfExists('google_revers');
    }
}
