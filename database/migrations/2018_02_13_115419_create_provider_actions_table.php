<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProviderActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provider_actions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('provider_id');
            $table->string('status')->nullable();
            $table->tinyInteger('effective_immediately');
            $table->date('effectivity_date')->nullable();
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
        Schema::dropIfExists('provider_actions');
    }
}
