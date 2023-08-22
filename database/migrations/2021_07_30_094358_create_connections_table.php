<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConnectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('connections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("requester_id");
            $table->unsignedBigInteger("friend_id");
            $table->text("request_comment");
            $table->boolean("is_default")->default(true)->comment("check if requester has written any message");
            $table->string("status")->default("Pending");
            $table->timestamps();
            $table->foreign("requester_id")->references("id")->on("clients");
            $table->foreign("friend_id")->references("id")->on("clients");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('connections');
    }
}
