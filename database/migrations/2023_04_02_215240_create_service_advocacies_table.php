<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceAdvocaciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_advocacies', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->string('tags');
            $table->string('copy');
            $table->longText('description');
            $table->string('existance');
            $table->longText('attachment');
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
        Schema::dropIfExists('service_advocacies');
    }
}
