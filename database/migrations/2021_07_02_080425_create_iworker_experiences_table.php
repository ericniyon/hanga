<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIworkerExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iworker_experiences', function (Blueprint $table) {
            $table->id();
            $table->string('service_offered');
            $table->string('description')->nullable();
            $table->string('year_of_completion');
            $table->string('client')->nullable();
            $table->unsignedBigInteger('iworker_registration_id');
            $table->timestamps();
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
        Schema::dropIfExists('iworker_experiences');
    }
}
