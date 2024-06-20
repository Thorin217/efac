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
        Schema::create('dte_third_party', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dte_id');
            $table->unsignedBigInteger('third_party_id');

            $table->foreign('dte_id')->references('id')->on('dtes')->onDelete('cascade');
            $table->foreign('third_party_id')->references('id')->on('third_parties')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dte_third_party');
    }
};
