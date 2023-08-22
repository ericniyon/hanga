<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientAggregatorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_aggregator', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aggrerated_by')->constrained('clients');
            $table->foreignId('client')->constrained('clients');
            $table->enum('status', ['Pending', 'Approved','Denied'])->nullable()->default('Pending');
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
        Schema::dropIfExists('client_aggregator');
    }
}
