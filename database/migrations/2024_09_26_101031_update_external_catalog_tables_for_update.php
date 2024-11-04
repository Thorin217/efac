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
        Schema::table('establishment_types', function (Blueprint $table) {
            $table->string('old_goes_id', 10)->nullable()->after('goes_id');
            $table->softDeletes();
        });

        /* Schema::table('measurement_units', function (Blueprint $table) {
            $table->string('old_goes_id', 10)->nullable()->after('goes_id');
            $table->softDeletes();
        }); */

        Schema::table('payment_types', function (Blueprint $table) {
            $table->string('old_goes_id', 10)->nullable()->after('goes_id');
            $table->softDeletes();
        });

        Schema::table('economic_activities', function (Blueprint $table) {
            $table->string('old_goes_id', 10)->nullable()->after('goes_id');
            $table->softDeletes();
        });

        Schema::table('countries', function (Blueprint $table) {
            $table->string('old_goes_id', 10)->nullable()->after('goes_id');
            $table->softDeletes();
        });

        // EXPORT
        Schema::table('tax_revenues', function (Blueprint $table) {
            $table->string('old_goes_id', 10)->nullable()->after('goes_id');
            $table->softDeletes();
        });

        Schema::table('regimens', function (Blueprint $table) {
            $table->string('old_goes_id', 15)->nullable()->after('goes_id');
            $table->softDeletes();
        });

        Schema::table('transport_modes', function (Blueprint $table) {
            $table->string('old_goes_id', 10)->nullable()->after('goes_id');
            $table->softDeletes();
        });

        Schema::table('incoterms', function (Blueprint $table) {
            $table->string('old_goes_id', 10)->nullable()->after('goes_id');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {}
};
