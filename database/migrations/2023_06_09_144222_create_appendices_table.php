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
        Schema::create('appendices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dte_id');
            $table->string('field', 25);
            $table->string('tag', 50);
            $table->string('value', 150);
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
        Schema::dropIfExists('appendices');
    }
};
