<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolutionBusinessSectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solution_business_sectors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('solution_id');
            $table->unsignedBigInteger('business_sector_id');
            $table->timestamps();

            $table->foreign('business_sector_id')
                ->references('id')
                ->on('business_sectors');

            $table->foreign('solution_id')->references('id')
                ->on('application_solutions')->cascadeOnDelete();

            $table->unique(['solution_id', 'business_sector_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solution_business_sectors');
    }
}
