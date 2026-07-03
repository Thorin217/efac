<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // FC: 1→2, CCF: 3→4, NR: 3→4, NC: 3→4, ND: 3→4, FEX: 1→3, FSE: 1→2, CD: 1→2
        $updates = [
            '01' => 2,
            '03' => 4,
            '04' => 4,
            '05' => 4,
            '06' => 4,
            '11' => 3,
            '14' => 2,
            '15' => 2,
        ];

        foreach ($updates as $goesId => $version) {
            DB::table('dte_types')->where('goes_id', $goesId)->update(['last_version' => $version]);
        }

        // CR: 1→2, CL: 1→2, DCL: 1→2
        DB::table('dte_types')
            ->whereIn('goes_id', ['07', '08', '09'])
            ->update(['last_version' => 2]);
    }

    public function down(): void
    {
        $rollbacks = [
            '01' => 1,
            '03' => 3,
            '04' => 3,
            '05' => 3,
            '06' => 3,
            '07' => 1,
            '08' => 1,
            '09' => 1,
            '11' => 1,
            '14' => 1,
            '15' => 1,
        ];

        foreach ($rollbacks as $goesId => $version) {
            DB::table('dte_types')->where('goes_id', $goesId)->update(['last_version' => $version]);
        }
    }
};
