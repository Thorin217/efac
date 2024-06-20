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
        DB::statement("ALTER TABLE dtes MODIFY COLUMN status VARCHAR(35) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no-sent'");
        DB::statement("ALTER TABLE cancellations MODIFY COLUMN status VARCHAR(35) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no-sent'");
        DB::statement("ALTER TABLE contingencies MODIFY COLUMN status VARCHAR(35) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no-sent'");
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
