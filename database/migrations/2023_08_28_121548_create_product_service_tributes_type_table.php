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
        Schema::create('product_service_tributes_type', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_service_id');
            $table->unsignedBigInteger('tributes_type_id');

            $table->foreign('tributes_type_id')->references('id')->on('tributes_types')->onDelete('cascade');

            $table->unique(['product_service_id', 'tributes_type_id'], 'unique_product_service_tribute_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_service_tributes_type');
    }
};
