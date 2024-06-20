<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('dtes', function (Blueprint $table) {
            $table->id();
            $table->string('remote_id', 50)->nullable();
            $table->bigInteger('documentable_id')->nullable();
            $table->string('documentable_type')->nullable();
            $table->unsignedBigInteger('dte_type_id');
            $table->unsignedBigInteger('model_type_id');
            $table->unsignedBigInteger('operation_type_id');
            $table->unsignedBigInteger('sale_point_id');
            $table->unsignedBigInteger('receiver_entity_id');
            $table->unsignedBigInteger('user_id')->comment('This id is used to identify a employee generate a new dte');
            $table->unsignedBigInteger('property_object_id')->nullable();
            $table->unsignedBigInteger('contingency_id')->nullable();
            $table->unsignedBigInteger('operation_condition_id')->nullable();
            $table->string('number_control');
            $table->string('generate_code')->unique();
            $table->dateTime('date');
            $table->string('status')->default('no-seed');
            $table->bigInteger('entity_id')->nullable();
            $table->timestamps();

            $table->foreign('dte_type_id')->references('id')->on('dte_types');
            $table->foreign('model_type_id')->references('id')->on('model_types');
            $table->foreign('operation_type_id')->references('id')->on('operation_types');
            $table->foreign('sale_point_id')->references('id')->on('sale_points');
            $table->foreign('receiver_entity_id')->references('id')->on('receiver_entities');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('property_object_id')->references('id')->on('property_objects');
            $table->foreign('contingency_id')->references('id')->on('contingencies');
            $table->foreign('operation_condition_id')->references('id')->on('operation_conditions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dtes');
    }
};
