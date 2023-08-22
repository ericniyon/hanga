<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembershipApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membership_applications', function (Blueprint $table) {
            $table->id();
            $table->string('clustre_items')->nullable();
            $table->string('Strategic_oriantation')->nullable();

            $table->string('student_benefit_sub_category')->nullable();
            $table->string('student_benefitUniversity')->nullable();
            $table->string('student_service_benefits')->nullable();

            $table->string('innovator_invester_sub_category')->nullable();
            $table->string('investor_service_benefits')->nullable();

            $table->string('startups_benefit_sub_category')->nullable();
            $table->string('startups_service_benefits')->nullable();

            $table->string('ict_msm_service_benefits')->nullable();

            $table->string('ict_consoltant_sub_category')->nullable();
            $table->string('ict_consultant_item_service')->nullable();

            $table->string('iWorker_sub_category')->nullable();
            $table->string('iworkers_benefitsServices')->nullable();

            $table->string('ict_ommunity_sub_category')->nullable();
            $table->string('community_partner_benefits_services')->nullable();

            $table->string('membership_levels')->nullable();
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
        Schema::dropIfExists('membership_applications');
    }
}
