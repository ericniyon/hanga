<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationSolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_solutions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('application_id');
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('type')->nullable()->comment('ex:service, product');
            $table->string('platform_type')->nullable();
            $table->string('mobile_application_type')->nullable();
            $table->string('has_api')->nullable();
            $table->string('api_name')->nullable();
            $table->text('api_description')->nullable();
            $table->string('api_link')->nullable();
            $table->timestamps();
            $table->foreign('application_id')->references('id')->on('applications');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('application_solutions');
    }
}
