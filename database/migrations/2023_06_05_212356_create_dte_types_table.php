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
        Schema::create('dte_types', function (Blueprint $table) {
            $table->id();
            $table->string('goes_id', 2);
            $table->string('name', 33);
            $table->integer('last_version');
            $table->boolean('can_go_into_contingency')->default(true);
            $table->boolean('has_contingency')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dte_types');
    }
};
