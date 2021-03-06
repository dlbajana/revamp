<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('short_name')->nullable();
            $table->string('licensed_name')->nullable();
            $table->string('business_type');
            $table->string('business_hours')->nullable();
            $table->integer('number_of_beds')->nullable();
            $table->string('tin')->nullable();
            $table->integer('tin_from_existing_provider')->nullable();
            $table->tinyInteger('tax_exempt')->default(0);
            $table->tinyInteger('withheld')->default(0);
            $table->string('accreditation_status');
            $table->tinyInteger('default_corporate_no_access')->default(0);
            $table->tinyInteger('suspected_fraud')->default(0);

            $table->string('bank_account_name')->nullable();
            $table->string('bank_account_no')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_branch')->nullable();

            $table->date('phic_accreditation_from')->nullable();
            $table->date('phic_accreditation_to')->nullable();

            $table->text('address')->nullable();
            $table->string('address_region_id')->nullable();
            $table->integer('address_province_id')->nullable();
            $table->integer('address_city_id')->nullable();
            $table->integer('address_baranggay_id')->nullable();

            $table->string('payment_setup')->nullable();
            $table->integer('payment_terms')->comment('Number of Days');
            $table->integer('submission_of_claims')->comment('Number of Days');

            $table->decimal('cash_bond', 10, 2)->nullable();
            $table->decimal('credit_limit', 10, 2)->nullable();

            $table->tinyInteger('prompt_payment_discount')->default(0);
            $table->decimal('prompt_payment_discount_rate', 10, 2)->nullable();
            $table->string('prompt_payment_discount_terms')->nullable();

            $table->decimal('late_payment_interest', 10, 2)->nullable();

            $table->tinyInteger('ip_opd_or_whole')->default(0);
            $table->string('ip_opd_or_whole_through')->nullable();

            $table->tinyInteger('ip_opd_or_split_hb_hospital')->default(0);
            $table->string('ip_opd_or_split_hb_hospital_through')->nullable();

            $table->tinyInteger('ip_opd_or_split_pf_doctor')->default(0);
            $table->string('ip_opd_or_split_pf_doctor_through')->nullable();

            $table->string('emergency_paid_to_hospital_through')->nullable();

            $table->tinyInteger('op_consult_referral_paid_to_hospital')->default(0);
            $table->string('op_consult_referral_paid_to_hospital_through')->nullable();

            $table->tinyInteger('op_consult_referral_paid_to_doctor')->default(0);
            $table->string('op_consult_referral_paid_to_doctor_through')->nullable();

            $table->string('op_lab_ape_facility_fee_paid_to_hospital_through')->nullable();

            $table->tinyInteger('clinic_setting_paid_to_hospital')->default(0);
            $table->string('clinic_setting_paid_to_hospital_through')->nullable();

            $table->tinyInteger('clinic_setting_paid_to_doctor')->default(0);
            $table->string('clinic_setting_paid_to_doctor_through')->nullable();

            $table->string('check_delivery_contact_person')->nullable();
            $table->string('check_delivery_contact_no')->nullable();
            $table->string('check_delivery_department')->nullable();

            $table->tinyInteger('with_mc')->default(0);
            $table->string('mc_name')->nullable();
            $table->string('mc_specialization')->nullable();
            $table->string('mc_secretary_name')->nullable();
            $table->string('mc_clinic_hours')->nullable();
            $table->string('mc_room_no')->nullable();
            $table->string('mc_contact_no')->nullable();

            $table->decimal('mc_ip_fee', 10, 2)->nullable();
            $table->decimal('mc_op_fee', 10, 2)->nullable();

            $table->decimal('ip_rates_ward', 10, 2)->nullable();
            $table->decimal('ip_rates_semi_private', 10, 2)->nullable();
            $table->decimal('ip_rates_private', 10, 2)->nullable();
            $table->decimal('ip_rates_suite', 10, 2)->nullable();
            $table->decimal('ip_rates_icu', 10, 2)->nullable();
            $table->decimal('ip_rates_anes', 10, 2)->nullable();
            $table->decimal('op_rates_pcp', 10, 2)->nullable();
            $table->decimal('op_rates_specialist', 10, 2)->nullable();

            $table->string('mode_of_releasing')->nullable();
            $table->string('doctor_accreditation')->nullable();
            $table->date('accreditation_date')->nullable();
            $table->date('disaccreditation_date')->nullable();

            $table->string('signatory_left_name')->nullable();
            $table->string('signatory_left_designation')->nullable();
            $table->string('signatory_right_name')->nullable();
            $table->string('signatory_right_designation')->nullable();

            $table->tinyInteger('internet_access_industrial')->default(0);
            $table->tinyInteger('internet_access_billing')->default(0);
            $table->tinyInteger('internet_access_emergency')->default(0);
            $table->tinyInteger('free_wifi_industrial_hmo')->default(0);
            $table->tinyInteger('free_wifi_ip_rooms')->default(0);
            $table->tinyInteger('free_wifi_emergency')->default(0);
            $table->tinyInteger('free_wifi_mab')->default(0);

            $table->string('orientation_contact_person')->nullable();
            $table->date('orientation_date')->nullable();

            $table->text('sign_off_document_url')->nullable();
            $table->text('remarks')->nullable();
            $table->integer('created_by');
            $table->string('status')->default('active');
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
        Schema::dropIfExists('providers');
    }
}
