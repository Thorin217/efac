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
        Schema::create('summary_tributes_type', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('summary_id');
            $table->unsignedBigInteger('tributes_type_id');
            $table->decimal('total', 15, 2)->nullable()->default(0);

            $table->foreign('summary_id')->references('id')->on('summaries')->onDelete('cascade');
            $table->foreign('tributes_type_id')->references('id')->on('tributes_types')->onDelete('restrict');


            $table->unique(['summary_id', 'tributes_type_id'], 'unique_summary_tribute_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('summary_tributes_type');
    }
};
