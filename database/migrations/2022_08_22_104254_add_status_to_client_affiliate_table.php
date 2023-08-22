<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToClientAffiliateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('client_affiliate', function (Blueprint $table) {
            $table->enum('owner_status', ['Pending', 'Approved','Denied'])->nullable()->default('Pending');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('client_affiliate', function (Blueprint $table) {
            $table->dropColumn('owner_status');

        });
    }
}
