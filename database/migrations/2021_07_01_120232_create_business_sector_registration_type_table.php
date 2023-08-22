<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessSectorRegistrationTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_sector_registration_type', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('business_sector_id');
            $table->unsignedBigInteger('registration_type_id');
            $table->timestamps();
            $table->foreign('business_sector_id')->references('id')->on('business_sectors');
            $table->foreign('registration_type_id')->references('id')->on('registration_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_sector_registration_type');
    }
}
