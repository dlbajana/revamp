<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorporatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corporates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('card_name');
            $table->string('industry')->nullable();
            $table->string('industry_others')->nullable();
            $table->string('account_type');
            $table->string('philhealth_no');
            $table->integer('acceptance_age');
            $table->integer('termination_age');
            $table->string('benefit_layer');
            $table->string('status');               // VALUE: active, expired, pending, extended, suspended, terminated
            $table->date('date_effectivity_from');
            $table->date('date_effectivity_to');        // System generated depending on the value of date_effectivity_from and effectivity_period
            $table->integer('effectivity_period');      // Number of months
            $table->date('date_expiry');                // System generated depending on the value of date_effectivity_to plus 1 (one) day.
            $table->text('company_logo_url')->nullable();
            $table->tinyInteger('co_brand')->default(0);

            $table->text('business_address');
            $table->string('business_address_region_id')->nullable();
            $table->integer('business_address_province_id')->nullable();
            $table->integer('business_address_city_id')->nullable();
            $table->integer('business_address_baranggay_id')->nullable();

            $table->text('billing_address')->nullable();
            $table->string('billing_address_region_id')->nullable();
            $table->integer('billing_address_province_id')->nullable();
            $table->integer('billing_address_city_id')->nullable();
            $table->integer('billing_address_baranggay_id')->nullable();

            $table->string('bank_name')->nullable();
            $table->string('bank_branch')->nullable();
            $table->string('bank_account_name')->nullable();
            $table->string('bank_account_no')->nullable();
            $table->date('billing_due_date');
            $table->tinyInteger('auto_deduct')->default(0);

            $table->string('contact_person_name');
            $table->string('contact_person_designation');
            $table->string('contact_person_telephone_no')->nullable();
            $table->string('contact_person_fax_no')->nullable();
            $table->string('contact_person_mobile_no')->nullable();
            $table->string('contact_person_email')->nullable();
            $table->string('hr_email')->nullable();                     // Name of the HR

            $table->string('tin')->unique();
            $table->tinyInteger('withheld')->default(0);
            $table->string('representative_name')->nullable();
            $table->string('representative_tin')->nullable();
            $table->string('representative_position');
            $table->text('electronic_signature_url')->nullable();
            $table->text('secretary_certificate_url')->nullable();

            $table->decimal('cash_bond', 10, 2)->nullable();
            $table->decimal('revolving_fund', 10, 2)->default(0);
            $table->decimal('utilized_amount', 10, 2)->default(0);
            $table->decimal('stale_amount', 10, 2)->default(0);
            $table->decimal('first_warning', 10, 2)->default(0);
            $table->decimal('threshold', 10, 2)->default(0);
            $table->decimal('remaining_fund', 10, 2)->default(0);
            $table->decimal('admin_fee', 10, 2)->default(0);
            $table->string('payment_setup')->nullable();

            $table->text('remarks')->nullable();
            $table->integer('created_by');
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
        Schema::dropIfExists('corporates');
    }
}
