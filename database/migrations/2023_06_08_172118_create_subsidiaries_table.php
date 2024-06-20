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
        Schema::create('subsidiaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('emitter_entity_id');
            $table->unsignedBigInteger('establishment_type_id');
            $table->string('code', 15)->nullable()->unique();
            $table->string('goes_id', 4)->nullable();
            $table->string('name', 100);
            $table->unsignedBigInteger('city_id')->nullable();
            $table->string('address_complement', 300)->nullable();
            $table->boolean('default')->nullable();
            $table->timestamps();

            $table->foreign('emitter_entity_id')->references('id')->on('emitter_entities');
            $table->foreign('establishment_type_id')->references('id')->on('establishment_types');
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
        Schema::dropIfExists('subsidiaries');
    }
};
