<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_infos', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('gender');
            $table->string('age');
            $table->string('education_level');
            $table->string('university');
            $table->string('devices_owned');
            $table->string('internet_access');
            $table->string('physical_tranning_attendence');
            $table->string('physical_attendence_district');
            $table->string('skills');
            $table->string('attend_digtal_tranning');
            $table->string('comment');
            $table->unsignedBigInteger('application_id');

            $table->foreign('application_id')->references('id')->on('tranning_applications')->onDelete('cascade');
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
        Schema::dropIfExists('applicant_infos');
    }
}
