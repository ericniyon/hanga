<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakePasswordNullableToClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->string('password')->nullable()->change();
            $table->unsignedBigInteger('registration_type_id')->nullable();
            $table->foreign('registration_type_id', 'registration_type_id_fk')
                ->on('registration_types')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropForeign('registration_type_id_fk');
            $table->dropColumn('registration_type_id');
        });
    }
}
