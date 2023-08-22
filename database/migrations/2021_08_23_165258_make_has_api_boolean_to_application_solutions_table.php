<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeHasApiBooleanToApplicationSolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('application_solutions', function (Blueprint $table) {
            $table->dropColumn('has_api');
        });

        Schema::table('application_solutions', function (Blueprint $table) {
            $table->boolean('has_api')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('application_solutions', function (Blueprint $table) {
        });
    }
}
