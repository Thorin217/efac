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
        Schema::create('exportations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dte_id');
            $table->unsignedBigInteger('regimen_id')->nullable();
            $table->unsignedBigInteger('tax_revenue_id')->nullable();
            $table->unsignedBigInteger('incoterm_id')->nullable();
            $table->decimal('insurance', 15, 2)->nullable()->default(0);
            $table->decimal('flete', 15, 2)->nullable()->default(0);
            $table->text('observations')->nullable();
            $table->timestamps();

            $table->foreign('dte_id')->references('id')->on('dtes');
            $table->foreign('regimen_id')->references('id')->on('regimens');
            $table->foreign('tax_revenue_id')->references('id')->on('tax_revenues');
            $table->foreign('incoterm_id')->references('id')->on('incoterms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exportations');
    }
};
