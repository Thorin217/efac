<?php

namespace Database\Seeders;

use Exactum\Efac\Models\Enterprise\EmitterEntity;
use Exactum\Efac\Models\Enterprise\Entity;
use Exactum\Efac\Models\External\City;
use Exactum\Efac\Models\External\EconomicActivity;
use Exactum\Efac\Services\Outlet\Subsidiary\SubsidiaryService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;

class MeakMeatsInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $economicActivityEntity = EconomicActivity::whereName('Venta al por menor de carnes y productos cárnicos')->first();
        $cityEntity = City::whereName('SAN MARCOS')->first();

        $entity = Entity::create([
            'address_complement' => 'Carretera a Comalapa Km 9.5, Edificio Publimovil',
            'name' => 'MAK MEATS, S.A. DE C.V.',
            'comercial_name' => 'MAK MEATS',
            'email' => 'facturacion.electronica@grupopublimovil.com',
            'city_id' => $cityEntity->id,
            'NRC' => '1740746',
            'economic_activity_id' => $economicActivityEntity->id,
        ]);

        $entity->docClientTypes()->attach(1, ['value' => '06142108061015']);

        $emitter = EmitterEntity::create([
            'entity_id' => $entity->id,
            'api_password' => Crypt::encryptString('password'),
            'signer_password' => Crypt::encryptString('password'),
        ]);

        SubsidiaryService::createDefaultSubsidiary($emitter->id, 'MAK MEATS, S.A. DE C.V.');
    }
}
