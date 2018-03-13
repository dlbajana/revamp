<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorporateActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corporate_actions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('corporate_id');
            $table->string('status')->nullable();
            $table->tinyInteger('effective_immediately');
            $table->date('effective_date')->nullable();
            $table->text('reason')->nullable();
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
        Schema::dropIfExists('corporate_actions');
    }
}
