<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLevelOfStudyToFieldOfStudies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('field_of_studies', function (Blueprint $table) {
            $table->unsignedBigInteger('level_of_study_id')
                ->nullable()
                ->after('id');
            $table->foreign('level_of_study_id')->references('id')->on('study_levels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('field_of_studies', function (Blueprint $table) {
            //
        });
    }
}
