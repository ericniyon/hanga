<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveFieldToIworkerRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('iworker_registrations', function (Blueprint $table) {
            $table->dropColumn(['field_of_study','physical_disability']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('iworker_registrations', function (Blueprint $table) {
            $table->string('field_of_study')->nullable();
            $table->string('physical_disability')->nullable();
        });
    }
}
