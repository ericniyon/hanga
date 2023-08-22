<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSenderToAdvocaciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('advocacies', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('sender')->nullable();
            $table->foreign('sender')->references('id')->on('clients');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('advocacies', function (Blueprint $table) {
            //
            $table->dropColumn('sender');
        });
    }
}
