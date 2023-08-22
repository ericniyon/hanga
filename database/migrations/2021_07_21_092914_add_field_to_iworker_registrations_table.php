<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldToIworkerRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('iworker_registrations', function (Blueprint $table) {
            $table->text('cp_description')->nullable();
            $table->string('logo')->nullable();
            $table->string('rdb_certificate')->nullable();
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
            $table->dropColumn(['cp_description', 'logo', 'rdb_certificate']);
        });
    }
}
