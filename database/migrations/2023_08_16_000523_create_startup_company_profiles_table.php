<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStartupCompanyProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('startup_company_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('clients', 'id')->cascadeOnDelete();
            $table->foreignId('category_id')->constrained('startup_categories', 'id')->cascadeOnDelete();
            $table->foreignId('sub_category_id')->constrained('startup_sub_categories', 'id')->cascadeOnDelete();
            $table->string('company_name')->nullable();
            $table->string('tin')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('location')->nullable();
            $table->string('registration_date')->nullable();
            $table->string('number_of_employee')->nullable();
            $table->string('rdb_certificate')->nullable();
            $table->string('website')->nullable();
            $table->text('mission')->nullable();
            $table->text('problem')->nullable();
            $table->string('logo')->nullable();
            $table->text('bio')->nullable();
            $table->string('current_step')->nullable();
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
        Schema::dropIfExists('startup_company_profiles');
    }
}
