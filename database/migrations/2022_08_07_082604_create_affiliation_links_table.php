<?php

use App\Models\AffiliateCohort;
use App\Models\Client;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffiliationLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliation_links', function (Blueprint $table) {
            $table->id();
            $table->string('link');
            $table->dateTime('expiry_date')->nullable();
            $table->integer('max_joins')->unsigned();
            $table->boolean('active')->default(true);
            $table->foreignIdFor(Client::class)->constrained();
            $table->foreignIdFor(AffiliateCohort::class)->nullable()->constrained();
            $table->softDeletes();
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
        Schema::dropIfExists('affiliation_links');
    }
}
