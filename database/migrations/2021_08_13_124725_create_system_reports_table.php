<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_reports', function (Blueprint $table) {
            $table->id();
            $table->string("report_name");
            $table->string("data_source");
            $table->text("column_list");
            $table->boolean("require_date_filter");
            $table->string("date_filter")->nullable();
            $table->string("date_filter_description")->nullable();
            $table->boolean("is_active")->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_reports');
    }
}
