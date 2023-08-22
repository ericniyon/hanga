<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStrategicOriantationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('strategic_oriantations', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');

            $table->string('color')->nullable();
            $table->unsignedBigInteger('membership_packeges_id');
            $table->timestamps();

            $table->foreign('membership_packeges_id')->references('id')->on('membership_packeges')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('strategic_oriantations');
    }
}
