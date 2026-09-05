<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('emitter_entities', function (Blueprint $table) {
            // Un equipo puede configurar su ambiente de pruebas antes de
            // tener credenciales de produccion (p. ej. equipos de demo
            // clonados sin entidad fiscal real), asi que estas columnas ya
            // no pueden ser obligatorias.
            $table->text('api_password')->nullable()->change();
            $table->text('signer_password')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('emitter_entities', function (Blueprint $table) {
            $table->text('api_password')->nullable(false)->change();
            $table->text('signer_password')->nullable(false)->change();
        });
    }
};
