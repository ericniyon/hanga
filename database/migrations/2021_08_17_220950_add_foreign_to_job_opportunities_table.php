<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToJobOpportunitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('job_opportunities', function (Blueprint $table) {
            $table->unsignedBigInteger('availability_type_id')->nullable();
            $table->foreign('availability_type_id')->references('id')->on('availability_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('job_opportunities', function (Blueprint $table) {
            //
        });
    }
}
