<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationSolutionPlatformTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_solution_platform_type', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('platform_type_id');
            $table->unsignedBigInteger('application_solution_id');
            $table->timestamps();
            $table->foreign('platform_type_id')->references('id')->on('platform_types');
            $table->foreign('application_solution_id')->references('id')->on('application_solutions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('application_solution_platform_type');
    }
}
