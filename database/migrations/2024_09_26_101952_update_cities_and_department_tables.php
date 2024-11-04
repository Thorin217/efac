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
        Schema::table('departments', function (Blueprint $table) {
            $table->string('old_goes_id', 10)->nullable();
            $table->softDeletes();
        });

        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->string('old_goes_id', 10)->nullable();
            $table->string('goes_id', 10);
            $table->string('name', 25);
            $table->boolean('default')->nullable();
            $table->foreignId('department_id')->nullable()->constrained('departments');
            $table->softDeletes();
        });

        Schema::table('cities', function (Blueprint $table) {
            $table->foreignId('state_id')->nullable()->constrained('states')->after('department_id');
            $table->string('old_goes_id', 10)->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
