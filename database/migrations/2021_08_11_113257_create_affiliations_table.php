<?php

use App\Constants;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffiliationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('employer_id');
            $table->string('position');
            $table->text('description')->nullable();
            $table->string('status')->default(Constants::Pending);
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('employer_id')->references('id')->on('clients');
            $table->unique(['employer_id','client_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('affiliations');
    }
}
