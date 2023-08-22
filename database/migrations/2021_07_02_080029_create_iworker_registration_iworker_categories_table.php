<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIworkerRegistrationIworkerCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iworker_registration_iworker_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('iworker_category_id');
            $table->unsignedBigInteger('iworker_registration_id');
            $table->timestamps();
            $table->foreign('iworker_category_id')->references('id')->on('iworker_categories');
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
        Schema::dropIfExists('iworker_registration_iworker_categories');
    }
}
