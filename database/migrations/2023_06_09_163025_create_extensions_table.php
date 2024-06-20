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
        Schema::create('extensions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dte_id');
            $table->unsignedBigInteger('user_id')->nullable()->comment('Receiving person, must be assigned to receiver entity');
            $table->text('remark');
            $table->timestamps();

            $table->foreign('dte_id')->references('id')->on('dtes');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('extensions');
    }
};
