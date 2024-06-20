<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dte_step', function (Blueprint $table) {
            $table->unsignedBigInteger('dte_id');
            $table->unsignedBigInteger('step_id');
            $table->boolean('complete')->default(false);

            $table->foreign('dte_id')->references('id')->on('dtes')->onDelete('restrict');
            $table->foreign('step_id')->references('id')->on('steps')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dte_step');
    }
};
