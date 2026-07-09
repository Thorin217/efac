<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Corrige codigos de catalogo CAT-017 (forma de pago) que quedaron sin el
     * cero a la izquierda (ej. "5" en vez de "05"). Hacienda rechaza el DTE
     * si "resumen.pagos.codigo" no mide exactamente 2 caracteres.
     */
    public function up()
    {
        DB::table('payment_types')
            ->whereRaw('CHAR_LENGTH(goes_id) = 1')
            ->update(['goes_id' => DB::raw("LPAD(goes_id, 2, '0')")]);
    }

    public function down() {}
};
