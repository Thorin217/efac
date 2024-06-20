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
        Schema::create('related_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dte_id');
            $table->unsignedBigInteger('dte_type_id');
            $table->unsignedBigInteger('generation_type_id');
            $table->string('identificator_document', 40)->comment('Physic identificator not exceed 20 characters');
            $table->date('date');
            $table->timestamps();

            $table->foreign('dte_id')->references('id')->on('dtes');
            $table->foreign('dte_type_id')->references('id')->on('dte_types');
            $table->foreign('generation_type_id')->references('id')->on('generation_types');

            $table->unique(['dte_id', 'identificator_document']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('related_documents');
    }
};
