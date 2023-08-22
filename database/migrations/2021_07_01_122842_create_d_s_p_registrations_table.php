<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDSPRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dsp_registrations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('application_id');
            $table->string('company_name')->nullable();
            $table->string('TIN')->nullable();
            $table->date('registration_date')->nullable();
            $table->string('rdb_certificate')->nullable();
            $table->unsignedBigInteger('province_id')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->unsignedBigInteger('sector_id')->nullable();
            $table->unsignedBigInteger('cell_id')->nullable();
            $table->unsignedBigInteger('village_id')->nullable();
            $table->string('company_phone')->nullable();
            $table->string('company_email')->nullable();
            $table->string('number_of_employees')->nullable();
            $table->string('website')->nullable();
            $table->unsignedBigInteger('company_category_id')->nullable();
            $table->text('company_description')->nullable();
            $table->string('logo')->nullable();
            $table->string('representative_name')->nullable();
            $table->string('representative_email')->nullable();
            $table->string('representative_phone')->nullable();
            $table->string('representative_position')->nullable();
            $table->string('representative_gender')->nullable();
            $table->string('representative_physical_disability')->nullable();
            $table->timestamps();
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->foreign('district_id')->references('id')->on('districts');
            $table->foreign('sector_id')->references('id')->on('sectors');
            $table->foreign('cell_id')->references('id')->on('cells');
            $table->foreign('village_id')->references('id')->on('villages');
            $table->foreign('company_category_id')->references('id')->on('company_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('d_s_p_registrations');
    }
}
