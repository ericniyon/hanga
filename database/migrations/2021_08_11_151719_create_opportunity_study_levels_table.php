<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpportunityStudyLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opportunity_study_levels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('study_level_id')->nullable();
            $table->unsignedBigInteger('opportunity_id')->nullable();

            $table->foreign('study_level_id')->references('id')->on('study_levels');
            $table->foreign('opportunity_id')->references('id')->on('job_opportunities');
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
        Schema::dropIfExists('opportunity_study_levels');
    }
}
