<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIworkerRegistrationIworkerMembershipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iworker_registration_iworker_membership', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('iworker_membership_id');
            $table->unsignedBigInteger('iworker_registration_id');
            $table->timestamps();
            $table->foreign('iworker_membership_id')->references('id')->on('iworker_memberships');
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
        Schema::dropIfExists('iworker_registration_iworker_membership');
    }
}
