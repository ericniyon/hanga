<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationFlowHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_flow_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("application_id");
            $table->text("comment")->nullable();
            $table->text("external_comment")->nullable();
            $table->string("attachment")->nullable();
            $table->string("external_attachment")->nullable();
            $table->string("status")->nullable();
            $table->boolean("is_comment")->default(0);
            $table->unsignedBigInteger("user_id")->nullable();
            $table->foreign('application_id')->references('id')->on('applications');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('application_flow_histories');
    }
}
