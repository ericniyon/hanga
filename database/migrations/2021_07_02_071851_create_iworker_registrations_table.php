<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIworkerRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iworker_registrations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('application_id');
            $table->string('name')->nullable();
            $table->string('id_type')->nullable();
            $table->string('id_number')->nullable();
            $table->string('comp_date_of_registration')->nullable();
            $table->string('iworker_type')->nullable();
            $table->string('website')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('gender')->nullable();
            $table->string('physical_disability')->nullable();
            $table->string('profile_picture')->nullable()->comment('logo for company');
            $table->string('dob')->nullable();
            $table->unsignedBigInteger('province_id')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->unsignedBigInteger('sector_id')->nullable();
            $table->unsignedBigInteger('cell_id')->nullable();
            $table->unsignedBigInteger('village_id')->nullable();
            $table->string('brief_bio')->nullable()->comment('company description');
            $table->string('portfolio_link')->nullable();
            $table->unsignedBigInteger('income_range_id')->nullable();
            $table->boolean('own_computer')->nullable();
            $table->boolean('can_access_internet')->nullable();
            $table->string('digital_literacy')->nullable();
            $table->boolean('can_attend_online_class')->nullable();
            $table->boolean('has_bank_account')->nullable();
            $table->boolean('credit_access')->nullable();
            $table->boolean('has_digital_platform')->nullable();
            $table->boolean('has_software_skills')->nullable();
            $table->unsignedBigInteger('level_of_study_id')->nullable()->comment('for individual');
            $table->string('field_of_study')->nullable()->comment('for individual');
            $table->string('supporting_document')->nullable()->comment('for individual');
            $table->string('cp_crepresentative_name')->nullable();
            $table->string('cp_representative_email')->nullable();
            $table->string('cp_representative_phone')->nullable();
            $table->string('cp_representative_position')->nullable();
            $table->string('cp_representative_gender')->nullable();
            $table->timestamps();
            $table->foreign('application_id')->references('id')->on('applications');
            $table->foreign('income_range_id')->references('id')->on('income_ranges');
            $table->foreign('level_of_study_id')->references('id')->on('study_levels');
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->foreign('district_id')->references('id')->on('districts');
            $table->foreign('sector_id')->references('id')->on('sectors');
            $table->foreign('cell_id')->references('id')->on('cells');
            $table->foreign('village_id')->references('id')->on('villages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('iworker_registrations');
    }
}
