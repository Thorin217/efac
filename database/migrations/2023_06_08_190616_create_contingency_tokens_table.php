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
        Schema::create('contingency_tokens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contingency_id');
            $table->mediumText('token');
            $table->text('seal_reception')->nullable();
            $table->text('error_message')->nullable();
            $table->timestamps();

            $table->foreign('contingency_id')->references('id')->on('contingencies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contingency_tokens');
    }
};
