<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToApplicationSolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('application_solutions', function (Blueprint $table) {
            $table->unsignedBigInteger('application_id')->nullable()->change();
            $table->string('logo')->nullable();
            $table->string('website')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
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
            $table->dropColumn('logo');
            $table->dropColumn('website');
            $table->dropColumn('phone');
            $table->dropColumn('email');
        });
    }
}
