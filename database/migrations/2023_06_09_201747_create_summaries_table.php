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
        Schema::create('summaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dte_id');
            $table->decimal('total_no_subject', 15, 2)->nullable()->default(0);
            $table->decimal('total_exempt', 15, 2)->nullable()->default(0);
            $table->decimal('total', 15, 2)->nullable()->default(0)->comment('CCFE,NCE,NDE,NRE,FCE,FEXE(totalGravado), FSEE(totalCompra), CDE(valorTotal)');
            $table->decimal('export', 15, 2)->nullable();
            $table->decimal('sub_total_sales', 15, 2)->nullable()->default(0);
            $table->decimal('discount_not_subject', 15, 2)->nullable()->default(0);
            $table->decimal('discount_exempt', 15, 2)->nullable()->default(0);
            $table->decimal('discount', 15, 2)->nullable()->default(0)->comment('CCFE,NCE,NDE,NRE,FCE(descuentoGravado), FEXE(descuento), FSEE(descu)');
            $table->decimal('percent_discount', 5, 2)->nullable()->default(0);
            $table->decimal('total_discount', 15, 2)->nullable()->default(0);
            $table->decimal('sub_total', 15, 2)->nullable();
            $table->decimal('IVA_collected', 15, 2)->nullable()->default(0);
            $table->decimal('IVA_withheld', 15, 2)->nullable()->default(0);
            $table->decimal('income_withheld', 15, 2)->nullable()->default(0);
            $table->decimal('mount_total_operation', 15, 2)->nullable()->default(0);
            $table->decimal('total_untaxed', 15, 2)->nullable()->default(0);
            $table->decimal('total_payable', 15, 2)->nullable()->default(0);
            $table->decimal('total_CLE', 15, 2)->nullable()->default(0);
            $table->string('total_letter', 200)->nullable()->default('cero 0/100 USD');
            $table->decimal('total_IVA', 15, 2)->nullable()->default(0);
            $table->decimal('balance_favor', 15, 2)->nullable()->default(0);
            $table->string('number_virtual_paid', 100)->nullable();
            $table->timestamps();

            $table->foreign('dte_id')->references('id')->on('dtes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('summaries');
    }
};
