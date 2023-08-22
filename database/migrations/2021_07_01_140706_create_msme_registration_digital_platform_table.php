<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMsmeRegistrationDigitalPlatformTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('msme_registration_digital_platform', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('digital_platform_id');
            $table->unsignedBigInteger('msme_registration_id');
            $table->string('link')->nullable();
            $table->timestamps();
            $table->foreign('digital_platform_id')->references('id')->on('digital_platforms');
            $table->foreign('msme_registration_id')->references('id')->on('msme_registrations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('msme_registration_digital_platform');
    }
}
