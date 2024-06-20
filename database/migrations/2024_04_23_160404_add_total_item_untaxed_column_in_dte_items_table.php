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
        Schema::table('dte_items', function (Blueprint $table) {
            $table->decimal('total_item_untaxed', 21, 8)->default(0)->after('total_item');
        });

        DB::statement('ALTER TABLE dte_items DROP CONSTRAINT only_one_non_zero');
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
