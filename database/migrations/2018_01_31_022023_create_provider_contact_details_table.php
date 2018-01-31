<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProviderContactDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provider_contact_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('provider_id');
            $table->string('name');
            $table->string('designation');
            $table->string('department');
            $table->string('mobile_no');
            $table->string('email');
            $table->string('fax_no');
            $table->string('telephone_no');
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
        Schema::dropIfExists('provider_contact_details');
    }
}
