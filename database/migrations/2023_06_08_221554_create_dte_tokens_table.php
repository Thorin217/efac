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
        Schema::create('dte_tokens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dte_id');
            $table->mediumText('token');
            $table->text('seal_reception')->nullable();
            $table->text('error_message')->nullable();
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
        Schema::dropIfExists('dte_tokens');
    }
};
