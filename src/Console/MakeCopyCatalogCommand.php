<?php

namespace Exactum\Efac\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class MakeCopyCatalogCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     * sail artisan make:copy-catalog establishment_types,measurement_units,payment_types,economic_activities,countries,tax_revenues,regimens,transport_modes,incoterms,departments,cities
     */
    protected $signature = 'make:copy-catalog {tables}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command for copy goes_id to old_goes_id';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $tables = explode(',', $this->argument('tables'));

        foreach ($tables as $table) {
            DB::table($table)->get()->each(function ($row) use ($table) {
                DB::table($table)->where('id', $row->id)->update([
                    'old_goes_id' => $row->goes_id,
                ]);
            });

            print("La tabla {$table} has sido actualizada... \n");
        }
    }
}
