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
            $table->string('type');
            $table->string('philhealth_no');
            $table->integer('acceptance_age');
            $table->integer('termination_age');
            $table->string('benefit_layer');
            $table->string('status');
            $table->date('date_effectivity_from');
            $table->date('date_effectivity_to');
            $table->date('date_expiry');
            $table->text('corporate_logo');
            $table->tinyInteger('co_brand')->default(0);

            $table->text('business_address');
            $table->text('billing_address')->nullable();

            $table->string('bank_name')->nullable();
            $table->string('bank_branch')->nullable();
            $table->string('bank_account_name')->nullable();
            $table->string('bank_account_no')->nullable();
            $table->date('billing_due_date');
            $table->tinyInteger('auto_deduct')->default(0);

            $table->string('contact_person');
            $table->string('contact_person_designation');
            $table->string('contact_person_telephone_no')->nullable();
            $table->string('contact_person_fax_no')->nullable();
            $table->string('contact_person_mobile_no')->nullable();
            $table->string('contact_person_email')->nullable();
            $table->string('hr_email')->nullable();

            $table->string('tin');
            $table->tinyInteger('withheld')->default(0);
            $table->string('representative_name')->nullable();
            $table->string('representative_tin')->nullable();
            $table->string('representative_position');
            $table->text('electronic_signature')->nullable();
            $table->text('secretary_certificate')->nullable();

            $table->decimal('cash_bond', 10, 2)->nullable();
            $table->decimal('revolving_fund', 10, 2)->default(0);
            $table->decimal('utilized_amount', 10, 2)->default(0);
            $table->decimal('stale_amount', 10, 2)->default(0);
            $table->decimal('threshold', 10, 2)->default(0);
            $table->decimal('remaining_fund', 10, 2)->default(0);
            $table->decimal('admin_fee', 10, 2)->default(0);
            $table->string('payment_setup')->nullable();

            $table->text('remarks');
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
