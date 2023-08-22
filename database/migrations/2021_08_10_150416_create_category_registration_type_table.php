<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryRegistrationTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_registration_type', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('registration_type_id');
            $table->timestamps();
/*
            $table->foreign('category_id')->references('id')->on('company_categories')->cascadeOnDelete();
            $table->foreign('registration_type_id')->references('id')->on('registration_types')->cascadeOnDelete();*/

            $table->unique(['category_id', 'registration_type_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_registration_type');
    }
}
