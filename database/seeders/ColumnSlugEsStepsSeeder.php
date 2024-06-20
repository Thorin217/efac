<?php

namespace Database\Seeders;

use Exactum\Efac\Models\Document\Step;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColumnSlugEsStepsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Step::whereSlug('identification')->update(['slug_es' => 'identificación']);
        Step::whereSlug('related-document')->update(['slug_es' => 'documentos relacionados']);
        Step::whereSlug('body')->update(['slug_es' => 'cuerpo del documento']);
        Step::whereSlug('cre-body')->update(['slug_es' => 'cuerpo del documento']);
        Step::whereSlug('summary')->update(['slug_es' => 'resumen']);
        Step::whereSlug('export-summary')->update(['slug_es' => 'resumen']);
        Step::whereSlug('excluded-summary')->update(['slug_es' => 'resumen']);
    }
}
