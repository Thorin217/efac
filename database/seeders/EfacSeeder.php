<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EfacSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DocClientTypesSeeder::class);
        $this->call(EconomicActivitySeeder::class);
        $this->call(EstablishmentTypesTableSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(TransportModeSeeder::class);
        $this->call(OtherDocumentTypeSeeder::class);
        $this->call(ContingencyTypeSeeder::class);
        $this->call(CancellationTypeSeeder::class);
        $this->call(ModelTypeSeeder::class);
        $this->call(OperationTypeSeeder::class);
        $this->call(PropertyObjectSeeder::class);
        $this->call(RegimenSeeder::class);
        $this->call(TaxRevenueSeeder::class);
        $this->call(ItemTypeSeeder::class);
        $this->call(PersonTypeSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(TaxRevenueSeeder::class);
        $this->call(DTETypeSeeder::class);
        $this->call(GenerationTypeSeeder::class);
        $this->call(IVARetentionSeeder::class);
        $this->call(TributesTypeSeeder::class);
        $this->call(PaymentTypeSeeder::class);
        $this->call(TermSeeder::class);
        $this->call(IncotermSeeder::class);
        $this->call(OperationConditionSeeder::class);
        $this->call(TaxDomicileSeeder::class);

        $this->call(SaleTypeSeeder::class);

        $this->call(DteTypeStepSeeder::class);
        $this->call(NreTypeStepSeeder::class);

        $this->call(AddCountryCodeSeeder::class);
        $this->call(ColumnSlugEsStepsSeeder::class);
    }
}
