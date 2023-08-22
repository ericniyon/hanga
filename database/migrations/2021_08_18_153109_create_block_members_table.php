<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlockMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('block_members', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger("blocker_id");
            $table->unsignedInteger("blocked_id");

            $table->foreign("blocker_id")->on("clients")->references("id");
            $table->foreign("blocked_id")->on("clients")->references("id");
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
        Schema::dropIfExists('block_members');
    }
}
