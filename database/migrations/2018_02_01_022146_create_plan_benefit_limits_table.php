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
            $table->decimal('ip_max_limit_basic', 10, 2);
            $table->decimal('ip_max_limit_major', 10, 2);

            $table->decimal('ip_room_board_basic', 10, 2)->nullable();
            $table->decimal('ip_room_board_major', 10, 2)->nullable();

            $table->string('ip_room_board_category')->nullable();

            $table->decimal('ip_hospital_services_basic', 10, 2)->nullable();
            $table->decimal('ip_hospital_services_major', 10, 2)->nullable();

            $table->decimal('ip_surgical_fee_basic', 10, 2)->nullable();
            $table->decimal('ip_surgical_fee_major', 10, 2)->nullable();

            $table->decimal('ip_physician_fee_basic', 10, 2)->nullable();
            $table->decimal('ip_physician_fee_major', 10, 2)->nullable();

            $table->decimal('ip_nurse_fee_basic', 10, 2)->nullable();
            $table->decimal('ip_nurse_fee_major', 10, 2)->nullable();

            $table->decimal('ip_opd_or_basic', 10, 2)->nullable();
            $table->decimal('ip_opd_or_major', 10, 2)->nullable();

            $table->decimal('ip_ecu_basic', 10, 2)->nullable();
            $table->decimal('ip_ecu_major', 10, 2)->nullable();

            $table->decimal('ip_anesthesiologist_rate_basic', 10, 4)->nullable();
            $table->decimal('ip_anesthesiologist_rate_major', 10, 4)->nullable();

            $table->decimal('op_max_limit_basic', 10, 2);
            $table->decimal('op_max_limit_major', 10, 2);

            $table->integer('op_total_number_of_visit')->nullable();

            $table->decimal('op_basic_consultation_basic', 10, 2)->nullable();
            $table->decimal('op_basic_consultation_major', 10, 2)->nullable();

            $table->decimal('op_laboratory_basic', 10, 2)->nullable();
            $table->decimal('op_laboratory_major', 10, 2)->nullable();

            $table->decimal('op_clinic_setting_basic', 10, 2)->nullable();
            $table->decimal('op_clinic_setting_major', 10, 2)->nullable();

            $table->decimal('op_emergency_basic', 10, 2)->nullable();
            $table->decimal('op_emergency_major', 10, 2)->nullable();

            $table->decimal('op_medicine_basic', 10, 2)->nullable();
            $table->decimal('op_medicine_major', 10, 2)->nullable();

            $table->decimal('maternity_max_limit_basic', 10, 2);
            $table->decimal('maternity_max_limit_major', 10, 2);

            $table->decimal('maternity_normal_delivery_basic', 10, 2)->nullable();
            $table->decimal('maternity_normal_delivery_major', 10, 2)->nullable();

            $table->decimal('maternity_cesarian_section_basic', 10, 2)->nullable();
            $table->decimal('maternity_cesarian_section_major', 10, 2)->nullable();

            $table->decimal('maternity_home_delivery_basic', 10, 2)->nullable();
            $table->decimal('maternity_home_delivery_major', 10, 2)->nullable();

            $table->decimal('maternity_miscarriage_basic', 10, 2)->nullable();
            $table->decimal('maternity_miscarriage_major', 10, 2)->nullable();

            $table->decimal('maternity_complication_basic', 10, 2)->nullable();
            $table->decimal('maternity_complication_major', 10, 2)->nullable();

            $table->decimal('maternity_nursery_basic', 10, 2)->nullable();
            $table->decimal('maternity_nursery_major', 10, 2)->nullable();

            $table->decimal('maternity_pre_post_natal_basic', 10, 2)->nullable();
            $table->decimal('maternity_pre_post_natal_major', 10, 2)->nullable();

            $table->decimal('ape_max_limit_basic', 10, 2);
            $table->decimal('ape_max_limit_major', 10, 2);
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
