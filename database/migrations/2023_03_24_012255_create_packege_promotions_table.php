<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackegePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packege_promotions', function (Blueprint $table) {
            $table->id();
            $table->string('promotion');
            $table->boolean('total_free')->default(false);
            $table->string('time_from_date');
            $table->string('time_to_date');
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
        Schema::dropIfExists('packege_promotions');
    }
}
