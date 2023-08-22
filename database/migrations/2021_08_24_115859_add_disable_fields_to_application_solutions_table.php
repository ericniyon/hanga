<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDisableFieldsToApplicationSolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('application_solutions', function (Blueprint $table) {
            $table->boolean('solution_enabled')->default(true);
            $table->boolean('open_api_enabled')->default(true);
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
            $table->dropColumn(['solution_enabled','api_enabled']);
        });
    }
}
