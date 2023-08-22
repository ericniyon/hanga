<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMsmeRegistrationPaymentMethodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('msme_registration_payment_method', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('msme_payment_id');
            $table->unsignedBigInteger('msme_registration_id');
            $table->timestamps();
            $table->foreign('msme_payment_id')->references('id')->on('payment_methods');
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
        Schema::dropIfExists('msme_registration_payment_method');
    }
}
