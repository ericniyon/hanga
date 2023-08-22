<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->string('resource_title');
            $table->string('resource_link')->nullable();
            $table->string('resource_cover');
            $table->foreignId('resource_category');
            $table->string('resource_field');
            $table->longText('resource_description');
            $table->timestamps();
            $table->foreign("resource_category")->references("id")->on("resources_categories");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resources');
    }
}
