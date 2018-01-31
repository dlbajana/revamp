<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('corporate_id');
            $table->string('name');
            $table->string('type');
            $table->string('limit');
            $table->integer('intervening_period')->default(0);
            $table->tinyInteger('shared_limit')->default(0);
            $table->tinyInteger('cover_prexisting')->default(0);

            $table->decimal('copay_company', 10, 2);
            $table->decimal('copay_member', 10, 2);

            $table->date('start_date');
            $table->date('end_date');

            $table->mediumText('covered_dreaded_diseases')->nullable();
            $table->mediumText('exclusions')->nullable();

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
        Schema::dropIfExists('plans');
    }
}
