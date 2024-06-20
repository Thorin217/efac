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
        Schema::create('dcle_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dte_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('identification')->nullable();
            $table->integer('number_document');
            $table->decimal('value_operation', 15, 2);
            $table->decimal('amount_without_perception', 15, 2)->nullable();
            $table->string('description', 100);
            $table->string('remarks', 200);
            $table->decimal('sub_total', 15, 2);
            $table->decimal('iva', 15, 2);
            $table->decimal('subject_perception', 15, 2);
            $table->decimal('iva_collected', 15, 2);
            $table->decimal('commission', 15, 2);
            $table->decimal('percent_commission', 15, 2);
            $table->decimal('iva_commission', 15, 2);
            $table->decimal('liquid_payable', 15, 2);
            $table->string('total_letters', 200);
            $table->timestamps();

            $table->foreign('dte_id')->references('id')->on('dtes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dcle_items');
    }
};
