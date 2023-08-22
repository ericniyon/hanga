<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIworkerRegistrationServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iworker_registration_service', function (Blueprint $table) {

            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('iworker_registration_id');
            $table->timestamps();
            $table->foreign('service_id')->references('id')->on('services');
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
        Schema::dropIfExists('iworker_registration_service');
    }
}
