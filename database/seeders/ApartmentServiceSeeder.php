<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ApartmentServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        # prendiamo tutti gli appartamenti salvati nel db
        $apartments = Apartment::all();

        # prendiamo tutti i servizi salvati nel db
        $services = Service::all();

        #disablitiamo le restrizioni sulle foreign key
        Schema::disableForeignKeyConstraints();

        # creiamo un array vuoto da popolare
        $data = [];

        # cicliamo gli appartamenti
        foreach ($apartments as $apartment) {
            #per ogni appartamento cicliamo i servizi
            foreach ($services as $service) {
                if (random_int(0, 1) === 0) {
                    array_push($data, ['apartment_id' => $apartment->id, 'service_id' => $service->id]);
                }
            }
        }

        DB::table('apartment_service')->insert($data);

        Schema::enableForeignKeyConstraints();
    }
}
