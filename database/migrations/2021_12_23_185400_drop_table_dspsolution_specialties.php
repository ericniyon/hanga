<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropTableDspsolutionSpecialties extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('dspsolution_specialties');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('dspsolution_specialties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('specialty_id')->constrained('specialties');
            $table->unsignedBigInteger('dspsolution_id');
            $table->timestamps();

            $table->foreign('dspsolution_id')->references('id')->on('application_solutions');
        });
    }
}
