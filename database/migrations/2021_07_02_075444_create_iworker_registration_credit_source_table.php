<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIworkerRegistrationCreditSourceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iworker_registration_credit_source', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('credit_source_id');
            $table->unsignedBigInteger('iworker_registration_id');
            $table->timestamps();
            $table->foreign('credit_source_id')->references('id')->on('credit_sources');
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
        Schema::dropIfExists('iworker_registration_credit_source');
    }
}
