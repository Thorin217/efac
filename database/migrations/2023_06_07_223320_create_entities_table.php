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
        Schema::create('entities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('entity_id')->nullable();
            $table->unsignedBigInteger('economic_activity_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->string('address_complement', 300)->nullable();
            $table->string('NRC', 8)->nullable();
            $table->string('name', 250)->comment('Name for person, reason social for enterprise');
            $table->string('comercial_name', 150)->nullable();
            $table->string('email', 100);
            $table->string('remote_id')->nullable();
            $table->string('remotable_type')->nullable();
            $table->bigInteger('remotable_id')->nullable();
            $table->boolean('approved')->default(false);
            $table->string('photo', 100)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('entity_id')->references('id')->on('entities');
            $table->foreign('economic_activity_id')->references('id')->on('economic_activities');
            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entities');
    }
};
