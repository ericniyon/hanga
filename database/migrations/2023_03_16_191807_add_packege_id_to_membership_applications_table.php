<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPackegeIdToMembershipApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('membership_applications', function (Blueprint $table) {
            $table->unsignedBigInteger('packege_id')->nullable();

            $table->foreign('packege_id')->references('id')->on('membership_packeges')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('membership_applications', function (Blueprint $table) {
            $table->dropColumn('packege_id');

        });
    }
}
