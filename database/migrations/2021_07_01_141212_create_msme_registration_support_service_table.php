<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMsmeRegistrationSupportServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('msme_registration_support_service', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('msme_registration_id');
            $table->string('link')->nullable();
            $table->timestamps();
            $table->foreign('service_id')->references('id')->on('services');
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
        Schema::dropIfExists('msme_registration_support_service');
    }
}
