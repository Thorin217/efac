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
        if (Schema::hasTable('countries')) {
            Schema::table('countries', function (Blueprint $table) {
                if (!Schema::hasColumn('countries', 'goes_id')) {
                    $table->string('goes_id', 4);
                }

                if (!Schema::hasColumn('countries', 'name')) {
                    $table->string('name', 150);
                }

                if (!Schema::hasColumn('countries', 'default')) {
                    $table->boolean('default')->nullable();
                }

                if (!Schema::hasColumn('countries', 'country_code')) {
                    $table->string('country_code', 10)->nullable();
                }
            });
        } else {
            Schema::create('countries', function (Blueprint $table) {
                $table->id();
                $table->string('goes_id', 4);
                $table->string('name', 150);
                $table->string('country_code', 10)->nullable();
                $table->boolean('default')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
};
