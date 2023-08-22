<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStartupSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('startup_sub_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('startup_category_id')->constrained('startup_categories', 'id')->cascadeOnDelete();
            $table->string('startup_sub_category_name')->nullable();
            $table->string('startup_sub_category_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('startup_sub_categories');
    }
}
