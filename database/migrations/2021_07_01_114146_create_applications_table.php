<?php

use App\Client;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id')->nullable();
            $table->string('status')->default('draft');
            $table->date('approval_date')->nullable();
            $table->date('submission_date')->nullable();
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->date('rejected_date')->nullable();
            $table->unsignedBigInteger('rejected_by')->nullable();
            $table->integer('current_step')->default(0);
            $table->timestamps();
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('approved_by')->references('id')->on('users');
            $table->foreign('rejected_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
