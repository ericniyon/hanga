<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolutionSpecialitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solution_specialities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('solution_id');
            $table->unsignedBigInteger('speciality_id');
            $table->timestamps();

            $table->foreign('speciality_id')
                ->references('id')
                ->on('specialties');

            $table->foreign('solution_id')->references('id')
                ->on('application_solutions')->cascadeOnDelete();

            $table->unique(['solution_id', 'speciality_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solution_specialities');
    }
}
