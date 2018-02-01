<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanBenefitLimitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_benefit_limits', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('plan_id');
            $table->string('ip_max_limit_basic')->nullable();
            $table->string('ip_max_limit_major')->nullable();

            $table->string('ip_room_board_basic')->nullable();
            $table->string('ip_room_board_major')->nullable();
            $table->string('ip_room_board_category')->nullable();

            $table->string('ip_hospital_services_basic')->nullable();
            $table->string('ip_hospital_services_major')->nullable();

            $table->string('ip_surgical_fees_basic')->nullable();
            $table->string('ip_surgical_fees_major')->nullable();

            $table->string('ip_physician_fee_basic')->nullable();
            $table->string('ip_physician_fee_major')->nullable();

            $table->string('ip_opd_or_basic')->nullable();
            $table->string('ip_opd_or_major')->nullable();

            $table->string('ip_icu_basic')->nullable();
            $table->string('ip_icu_major')->nullable();

            $table->string('anesthesiologist_rate_basic')->nullable();
            $table->string('anesthesiologist_rate_major')->nullable();

            $table->string('op_max_limit_basic')->nullable();
            $table->string('op_max_limit_major')->nullable();

            $table->integer('op_total_number_of_visit')->nullable();

            $table->string('op_basic_consultation_basic')->nullable();
            $table->string('op_basic_consultation_major')->nullable();

            $table->string('op_laboratory_basic')->nullable();
            $table->string('op_laboratory_major')->nullable();

            $table->string('op_clinic_setting_basic')->nullable();
            $table->string('op_clinic_setting_major')->nullable();

            $table->string('op_emergency_basic')->nullable();
            $table->string('op_emergency_major')->nullable();

            $table->string('op_medicine_basic')->nullable();
            $table->string('op_medicine_major')->nullable();

            $table->string('maternity_max_limit_basic')->nullable();
            $table->string('maternity_max_limit_major')->nullable();

            $table->string('maternity_delivery_basic')->nullable();
            $table->string('maternity_delivery_major')->nullable();

            $table->string('maternity_pre_post_natal_basic')->nullable();
            $table->string('maternity_pre_post_natal_major')->nullable();

            $table->string('ape_max_limit_basic')->nullable();
            $table->string('ape_max_limit_major')->nullable();

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
        Schema::dropIfExists('plan_benefit_limits');
    }
}
