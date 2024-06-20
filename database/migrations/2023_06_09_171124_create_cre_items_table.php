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
        Schema::create('cre_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dte_id');
            $table->unsignedBigInteger('iva_retention_id');
            $table->unsignedBigInteger('related_document_id');
            $table->text('description');
            $table->decimal('amount_taxable', 15, 2);
            $table->decimal('iva_withheld', 15, 2);
            $table->timestamps();

            $table->foreign('dte_id')->references('id')->on('dtes');
            $table->foreign('iva_retention_id')->references('id')->on('iva_retentions');
            $table->foreign('related_document_id')->references('id')->on('related_documents');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cre_items');
    }
};
