<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->unsignedBigInteger('term_id')->nullable()->change();
            $table->integer('period')->nullable()->change();
            $table->string('reference', 50)->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->unsignedBigInteger('term_id')->nullable(false)->change();
            $table->integer('period')->nullable(false)->change();
            $table->string('reference', 50)->nullable(false)->change();
        });
    }
};
