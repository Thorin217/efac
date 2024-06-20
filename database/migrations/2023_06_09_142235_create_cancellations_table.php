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
        Schema::create('cancellations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dte_id')->comment('Dte to cancel');
            $table->unsignedBigInteger('new_dte_id')->nullable()->comment('Dte to replace dte_id');
            $table->unsignedBigInteger('cancellation_type_id');
            $table->unsignedBigInteger('user_id');
            $table->string('description', 500)->nullable();
            $table->string('generate_code')->unique();
            $table->string('status', 20)->default('no-seed');
            $table->bigInteger('entity_id')->nullable();
            $table->timestamps();

            $table->foreign('dte_id')->references('id')->on('dtes');
            $table->foreign('new_dte_id')->references('id')->on('dtes');
            $table->foreign('cancellation_type_id')->references('id')->on('cancellation_types');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cancellations');
    }
};
