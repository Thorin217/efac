<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('dte_items', function (Blueprint $table) {
            $table->id();
            $table->string('remote_id', 50)->nullable();
            $table->unsignedBigInteger('dte_id');
            $table->unsignedBigInteger('tributes_type_id')->nullable()->comment('Especial tribute column');
            $table->unsignedBigInteger('product_service_id')->nullable();
            $table->unsignedBigInteger('related_document_id')->nullable()->comment('For CLE related documents');
            $table->text('description')->nullable()->comment('All(descripcion, cuando se use no gravado) CLE(obsItem)');
            $table->decimal('quantity', 21, 8)->nullable()->default(1);
            $table->decimal('unit_price', 21, 8)->nullable()->default(0);
            $table->decimal('discount', 21, 8)->nullable()->default(0)->comment('All(descuento por item) CDE (depreacion)');
            $table->decimal('total_item_no_subject', 21, 8)->nullable()->default(0)->comment('FSEE(venta), CDE(valor), (price_item * quantity) - discount');
            $table->decimal('total_item_exempt', 21, 8)->nullable()->default(0)->comment('(price_item * quantity) - discount');
            $table->decimal('total_item', 21, 8)->nullable()->default(0)->comment('All(subTotal por item), CCFE,FC,FEX(no gravado); (price_item * quantity) - discount');
            $table->decimal('iva_item', 21, 8)->nullable()->comment('Only for FCE');

            $table->timestamps();

            $table->foreign('dte_id')->references('id')->on('dtes');
            $table->foreign('tributes_type_id')->references('id')->on('tributes_types');
            $table->foreign('product_service_id')->references('id')->on('product_services');
            $table->foreign('related_document_id')->references('id')->on('related_documents');

            $table->unique(['dte_id', 'product_service_id'], 'unique_dte_product_service');
        });

        DB::statement('ALTER TABLE dte_items ADD CONSTRAINT only_one_non_zero CHECK
            (
                (total_item = 0 AND total_item_exempt = 0 AND total_item_no_subject != 0) OR
                (total_item = 0 AND total_item_exempt != 0 AND total_item_no_subject = 0) OR
                (total_item != 0 AND total_item_exempt = 0 AND total_item_no_subject = 0)
            )');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dte_items');
        DB::statement('ALTER TABLE dte_items DROP CONSTRAINT only_one_non_zero');
    }
};
