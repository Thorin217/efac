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
        Schema::create('doc_client_type_entity', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doc_client_type_id');
            $table->unsignedBigInteger('entity_id');
            $table->string('value', 100);

            $table->foreign('doc_client_type_id')->references('id')->on('doc_client_types')->onDelete('RESTRICT');
            $table->foreign('entity_id')->references('id')->on('entities')->onDelete('RESTRICT');

            $table->unique(['doc_client_type_id', 'entity_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doc_client_type_entity');
    }
};
