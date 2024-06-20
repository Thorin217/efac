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
        Schema::create('cre_summaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dte_id');
            $table->decimal('total_subject_withheld', 15, 2);
            $table->decimal('total_IVA_withheld', 15, 2);
            $table->string('total_IVA_withheld_letter', 200)->nullable()->default('cero 0/100 USD');
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
        Schema::dropIfExists('cre_summaries');
    }
};
