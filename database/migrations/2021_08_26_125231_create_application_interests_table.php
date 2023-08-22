<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationInterestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_interests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('application_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('registration_type_id');
            $table->timestamps();

            $table->foreign('application_id')->references('id')->on('applications');
            $table->foreign('category_id')->references('id')->on('company_categories');
            $table->foreign('registration_type_id')->references('id')->on('registration_types');
            $table->unique(['application_id', 'category_id','registration_type_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('application_interests');
    }
}
