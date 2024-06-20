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
        Schema::table('contingencies', function (Blueprint $table) {
            $table->unsignedBigInteger('sale_point_id')->after('contingency_type_id');
            $table->unsignedBigInteger('user_id')->after('sale_point_id');

            $table->foreign('sale_point_id')->references('id')->on('sale_points')->onDelete('RESTRICT');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
};
