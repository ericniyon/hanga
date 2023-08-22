<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddParentToAffiliateCohortsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('affiliate_cohorts', function (Blueprint $table) {
            $table->after('id',function($table){
                $table->foreignId('parent_id')->nullable()->constrained('affiliate_cohorts')->onDelete('cascade');
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('affiliate_cohorts', function (Blueprint $table) {
            $table->dropForeign('affiliate_cohorts_parent_id_foreign');
            $table->dropcolumn('parent_id');
        });
    }
}
