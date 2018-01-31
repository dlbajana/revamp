<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('corporate_id');
            $table->integer('plan_id');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('suffix')->nullable();
            $table->string('nick_name')->nullable();
            $table->date('birthday');
            $table->string('gender');
            $table->string('civil_status')->nullable();
            $table->string('nationality')->nullable();
            $table->text('address');

            $table->string('email');
            $table->string('telephone_no')->nullable();
            $table->string('mobile_no');
            $table->string('sss_no');
            $table->tinyInteger('philhealth_required')->default(0);
            $table->string('philhealth_no')->nullable();
            $table->string('tin');
            $table->string('position')->nullable();
            $table->string('designation')->nullable();
            $table->string('department')->nullable();

            $table->string('type');
            $table->integer('principal_id')->nullable();
            $table->date('date_enrolled')->nullable();
            $table->date('activation_date')->nullable();
            $table->date('expiry_date')->nullable();
            $table->string('status');

            $table->string('new_card_file_name')->nullable();
            $table->string('replace_card_file_name')->nullable();
            $table->string('reprint_card_file_name')->nullable();

            $table->string('passport_no')->nullable();
            $table->string('policy_no')->nullable();
            $table->string('bank_account_no')->nullable();
            $table->string('employee_no')->nullable();
            $table->date('date_hired')->nullable();

            $table->string('username');
            $table->string('password');

            $table->tinyInteger('vip')->default(0);

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
        Schema::dropIfExists('members');
    }
}
