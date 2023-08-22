<?php

use App\Models\AffiliateCohort;
use App\Models\AffiliationLink;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientAffiliateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_affiliate', function (Blueprint $table) {
            $table->id();
            $table->foreignId('affiliated_by')->constrained('clients');
            $table->foreignId('affiliates')->constrained('clients');
            $table->foreignIdFor(AffiliateCohort::class)->nullable()->constrained();
            $table->foreignIdFor(AffiliationLink::class)->nullable()->constrained();
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
        Schema::dropIfExists('client_affiliate');
    }
}
