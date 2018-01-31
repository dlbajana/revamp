<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanCoveragesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_coverages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('plan_id');
            $table->tinyInteger('inpatient')->default(0);
            $table->tinyInteger('outpatient')->default(0);

            $table->tinyInteger('op_basic_consultation')->default(0);
            $table->tinyInteger('op_referral_to_specialist')->default(0);
            $table->tinyInteger('op_laboratory')->default(0);
            $table->tinyInteger('op_opd_or')->default(0);
            $table->tinyInteger('op_facility_fee')->default(0);
            $table->tinyInteger('op_clinic_setting')->default(0);

            $table->tinyInteger('annual_physical_exam')->default(0);
            $table->tinyInteger('emergency')->default(0);

            $table->tinyInteger('maternity')->default(0);
            $table->tinyInteger('maternity_pre_and_post_natal')->default(0);
            $table->tinyInteger('maternity_laboratory')->default(0);
            $table->tinyInteger('maternity_delivery')->default(0);

            $table->tinyInteger('reimbursement')->default(0);
            $table->tinyInteger('reimbursement_inpatient')->default(0);
            $table->tinyInteger('reimbursement_outpatient')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plan_coverages');
    }
}
