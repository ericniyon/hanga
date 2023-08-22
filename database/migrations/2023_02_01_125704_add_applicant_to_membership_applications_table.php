<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddApplicantToMembershipApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('membership_applications', function (Blueprint $table) {
            $table->unsignedBigInteger('applicant_id')->nullable();

            $table->foreign('applicant_id')->references('id')->on('clients')->onDelete('cascade');
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
            $table->dropColumn('applicant_id');
        });
    }
}
