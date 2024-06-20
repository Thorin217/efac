<?php

namespace Database\Seeders;

use Exactum\Efac\Models\Document\Step;
use Exactum\Efac\Models\External\DteType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DteTypeStepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $identification = Step::create([
            'slug' => 'identification',
            'order' => 0,
            'requerid' => true,
        ]);

        $relatedDocument = Step::create([
            'slug' => 'related-document',
            'order' => 1,
            'requerid' => true,
        ]);

        $relatedDocumentOptional = Step::create([
            'slug' => 'related-document',
            'order' => 1,
            'requerid' => false,
        ]);

        $otherDocument = Step::create([
            'slug' => 'other-document',
            'order' => 2,
            'requerid' => false,
        ]);

        $thirdParty = Step::create([
            'slug' => 'third-party',
            'order' => 3,
            'requerid' => false,
        ]);

        $body = Step::create([
            'slug' => 'body',
            'order' => 4,
            'requerid' => true,
        ]);

        $extension = Step::create([
            'slug' => 'extension',
            'order' => 5,
            'requerid' => false,
        ]);

        $appendix = Step::create([
            'slug' => 'appendix',
            'order' => 6,
            'requerid' => false,
        ]);

        $payments = Step::create([
            'slug' => 'payments',
            'order' => 7,
            'requerid' => false,
        ]);

        $creBody = Step::create([
            'slug' => 'cre-body',
            'order' => 8,
            'requerid' => true,
        ]);

        $summary = Step::create([
            'slug' => 'summary',
            'order' => 8,
            'requerid' => true,
        ]);

        $exportSummary = Step::create([
            'slug' => 'export-summary',
            'order' => 8,
            'requerid' => true,
        ]);

        $excludedSummary = Step::create([
            'slug' => 'excluded-summary',
            'order' => 8,
            'requerid' => true,
        ]);

        $fce = DteType::whereName('Factura')->first();
        $ccfe = DteType::whereName('Comprobante de crédito fiscal')->first();
        $nre = DteType::whereName('Nota de remisión')->first();
        $nce = DteType::whereName('Nota de crédito')->first();
        $nde = DteType::whereName('Nota de débito')->first();
        $cre = DteType::whereName('Comprobante de retención')->first();
        $fexe = DteType::whereName('Facturas de exportación')->first();
        $fsee = DteType::whereName('Factura de sujeto excluido')->first();

        $identification->dteTypes()->attach([
            $fce->id,
            $ccfe->id,
            $nce->id,
            $nde->id,
            $cre->id,
            $fexe->id,
            $fsee->id,
            $nre->id,
        ]);

        $relatedDocument->dteTypes()->attach([
            $nce->id,
            $nde->id,
        ]);

        $relatedDocumentOptional->dteTypes()->attach([
            $fce->id,
            $ccfe->id,
            $nre->id,
        ]);

        $otherDocument->dteTypes()->attach([
            $fce->id,
            $ccfe->id,
            $fexe->id,
        ]);

        $thirdParty->dteTypes()->attach([
            $fce->id,
            $ccfe->id,
            $nce->id,
            $nde->id,
            $fexe->id,
            $nre->id,
        ]);

        $body->dteTypes()->attach([
            $fce->id,
            $ccfe->id,
            $nce->id,
            $nde->id,
            $fexe->id,
            $fsee->id,
            $nre->id,
        ]);

        $creBody->dteTypes()->attach([
            $cre->id,
        ]);

        $summary->dteTypes()->attach([
            $fce->id,
            $ccfe->id,
            $nce->id,
            $nde->id,
            $nre->id,
        ]);

        $exportSummary->dteTypes()->attach([
            $fexe->id,
        ]);

        $excludedSummary->dteTypes()->attach([
            $fsee->id,
        ]);

        $extension->dteTypes()->attach([
            $fce->id,
            $ccfe->id,
            $nce->id,
            $nde->id,
            $cre->id,
            $nre->id,
        ]);

        $appendix->dteTypes()->attach([
            $fce->id,
            $ccfe->id,
            $nce->id,
            $nde->id,
            $cre->id,
            $fexe->id,
            $fsee->id,
            $nre->id,
        ]);

        $payments->dteTypes()->attach([
            $fce->id,
            $ccfe->id,
            $fexe->id,
            $fsee->id,
        ]);
    }
}
