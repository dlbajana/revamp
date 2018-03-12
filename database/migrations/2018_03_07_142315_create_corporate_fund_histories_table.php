<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorporateFundHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corporate_fund_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('corporate_id');
            $table->decimal('debit', 11, 2)->nullable();
            $table->decimal('credit', 11, 2)->nullable();
            $table->decimal('running_balance', 11, 2);
            $table->string('title');
            $table->string('created_by')->nullable();
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
        Schema::dropIfExists('corporate_fund_histories');
    }
}
