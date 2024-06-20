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
        Schema::create('receiver_entities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('person_type_id')->nullable();
            $table->unsignedBigInteger('country_id')->comment('Default country is "El Salvador" with goes_id 9300');
            $table->unsignedBigInteger('tax_domicile_id')->nullable();
            $table->unsignedBigInteger('entity_id');
            $table->unsignedBigInteger('sale_type_id')->default(3);
            $table->string('foreign_economic_activity_description', 150)->nullable();
            $table->timestamps();

            $table->foreign('person_type_id')->references('id')->on('person_types');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('tax_domicile_id')->references('id')->on('tax_domiciles');
            $table->foreign('entity_id')->references('id')->on('entities');
            $table->foreign('sale_type_id')->references('id')->on('sale_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receiver_entities');
    }
};
