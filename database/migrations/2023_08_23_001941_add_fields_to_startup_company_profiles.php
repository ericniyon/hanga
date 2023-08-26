<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToStartupCompanyProfiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('startup_company_profiles', function (Blueprint $table) {
            //
            $table->text('revenue_stream')->nullable();
            $table->text('market_size')->nullable();
            $table->text('fund_raising')->nullable();
            $table->text('fund_raising_reason')->nullable();
            $table->string('acheivement')->nullable();
            $table->date('acheivement_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('startup_company_profiles', function (Blueprint $table) {
            //
        });
    }
}
