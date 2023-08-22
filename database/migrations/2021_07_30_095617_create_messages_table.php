<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->text("message");
            $table->unsignedBigInteger("from")->comment("Sender of the message");
            $table->unsignedBigInteger("to")->comment("receiver of the message");
            $table->string("status")->default("Pending");
            $table->timestamps();
            $table->foreign("from")->references("id")->on("clients");
            $table->foreign("to")->references("id")->on("clients");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
