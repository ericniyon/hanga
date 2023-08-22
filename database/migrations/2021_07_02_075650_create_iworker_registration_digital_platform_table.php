<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIworkerRegistrationDigitalPlatformTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iworker_registration_digital_platform', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('digital_platform_id');
            $table->unsignedBigInteger('iworker_registration_id');
            $table->string('link');
            $table->timestamps();
            $table->foreign('digital_platform_id')->references('id')->on('digital_platforms');
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
        Schema::dropIfExists('iworker_registration_digital_platform');
    }
}
