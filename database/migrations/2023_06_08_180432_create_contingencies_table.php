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
        Schema::create('contingencies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contingency_type_id');
            $table->uuid('generate_code')->unique();
            $table->string('description', 500)->nullable();
            $table->dateTime('start_date');
            $table->dateTime('end_date')->nullable();
            $table->string('status', 20)->default('no-seed');
            $table->timestamps();

            $table->foreign('contingency_type_id')->references('id')->on('contingency_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contingencies');
    }
};
