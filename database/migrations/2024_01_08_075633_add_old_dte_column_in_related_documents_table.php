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
        Schema::table('related_documents', function (Blueprint $table) {
            $table->unsignedBigInteger('main_dte_id')->nullable()->after('dte_type_id');

            $table->foreign('main_dte_id')->references('id')->on('dtes');
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
