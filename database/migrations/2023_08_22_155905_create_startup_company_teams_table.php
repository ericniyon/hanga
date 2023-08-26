<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStartupCompanyTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('startup_company_teams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('clients', 'id')->cascadeOnDelete();
            $table->string('team_firstname')->nullable();
            $table->string('team_lastname')->nullable();
            $table->string('team_phone')->nullable();
            $table->string('team_email')->nullable();
            $table->string('team_position')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('startup_company_teams');
    }
}
