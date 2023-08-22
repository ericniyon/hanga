<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIworkerCompanyEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iworker_company_employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('position')->nullable();
            $table->string('recruitment_date')->nullable();
            $table->unsignedBigInteger('level_of_study_id')->nullable();
            $table->string('field_of_study')->nullable();
            $table->string('supporting_document')->nullable();
            $table->unsignedBigInteger('iworker_registration_id');
            $table->timestamps();
            $table->foreign('level_of_study_id')->references('id')->on('study_levels');
            $table->foreign('iworker_registration_id')->references('id')->on('iworker_registrations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('iworker_company_employees');
    }
}
