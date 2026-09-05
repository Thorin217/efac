<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('dtes', function (Blueprint $table) {
            // '01' produccion, '00' pruebas (CAT-001) -- se fija una sola vez
            // al crear el DTE, para que quede como registro historico fijo y
            // no dependa de si el equipo sigue siendo demo mas adelante.
            $table->string('ambiente', 2)->default('01')->after('status');
        });

        Schema::table('emitter_entities', function (Blueprint $table) {
            // Credenciales del ambiente de pruebas de Hacienda -- distintas
            // de las de produccion aunque sea el mismo NIT.
            $table->text('signer_password_test')->nullable()->after('signer_password');
            $table->text('api_password_test')->nullable()->after('api_password');
        });
    }

    public function down()
    {
        Schema::table('dtes', function (Blueprint $table) {
            $table->dropColumn('ambiente');
        });

        Schema::table('emitter_entities', function (Blueprint $table) {
            $table->dropColumn(['signer_password_test', 'api_password_test']);
        });
    }
};
