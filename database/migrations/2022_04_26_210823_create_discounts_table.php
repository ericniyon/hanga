<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('discount');
            $table->string('coupons');
            $table->string('from');
            $table->string('to');
            $table->string('cover_photo');
            $table->string('services');
            $table->string('status')->default(0);
            $table->unsignedBigInteger('category');
            $table->timestamps();
            $table->foreign('category')->references('id')
                ->on('discount_categories')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discounts');
    }
}
