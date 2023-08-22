<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnsToIworkerRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('iworker_registrations', function (Blueprint $table) {
            $table->renameColumn('cp_crepresentative_name', 'cp_representative_name');
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
            $table->renameColumn('cp_representative_name', 'cp_crepresentative_name');
        });
    }
}
