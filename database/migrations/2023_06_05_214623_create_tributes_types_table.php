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
        Schema::create('tributes_types', function (Blueprint $table) {
            $table->id();
            $table->string('goes_id', 2);
            $table->string('name', 100);
            $table->float('retail_price', 11, 2)->nullable();
            $table->boolean('percent')->default(false)->nullable();
            $table->boolean('default')->nullable();
            $table->integer('classification');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tributes_types');
    }
};
