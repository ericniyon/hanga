<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationFieldOfStudyToIworkerRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('iworker_registrations', function (Blueprint $table) {
            $table->unsignedBigInteger('field_of_study_id')->nullable();
            $table->unsignedBigInteger('physical_disability_id')->nullable();
            $table->unsignedBigInteger('rep_physical_disability_id')->nullable();

            $table->foreign('field_of_study_id')->references('id')->on('field_of_studies');
            $table->foreign('physical_disability_id')->references('id')->on('physical_disabilities');
            $table->foreign('rep_physical_disability_id')->references('id')->on('physical_disabilities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('iworker_registrations', function (Blueprint $table) {
            //
        });
    }
}
