<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhysiciansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('physicians', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('suffix')->nullable();
            $table->string('mothers_maiden_name')->nullable();
            $table->string('nationality')->nullable();
            $table->date('birthday')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('gender');
            $table->integer('specialization_id')->nullable();
            $table->integer('subspecialization_id')->nullable();
            $table->string('accreditation_status');
            $table->string('status');
            $table->tinyInteger('suspected_fraud')->default(0);

            $table->string('telephone_no')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('email')->nullable();

            $table->text('home_address')->nullable();
            $table->string('home_address_region_id')->nullable();
            $table->integer('home_address_province_id')->nullable();
            $table->integer('home_address_city_id')->nullable();
            $table->integer('home_address_baranggay_id')->nullable();

            $table->text('provincial_address')->nullable();
            $table->string('provincial_address_region_id')->nullable();
            $table->integer('provincial_address_province_id')->nullable();
            $table->integer('provincial_address_city_id')->nullable();
            $table->integer('provincial_address_baranggay_id')->nullable();

            $table->string('bank_name')->nullable();
            $table->string('bank_branch')->nullable();
            $table->string('bank_account_name')->nullable();
            $table->string('bank_account_no')->nullable();

            $table->string('tin')->unique();
            $table->string('sss_no')->nullable();
            $table->string('philhealth_no')->nullable();
            $table->date('phic_accreditation_from')->nullable();
            $table->date('phic_accreditation_to')->nullable();
            $table->string('prc_license_no')->nullable();
            $table->date('prc_validity_date')->nullable();

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
        Schema::dropIfExists('physicians');
    }
}
