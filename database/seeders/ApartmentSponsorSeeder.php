<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Sponsor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ApartmentSponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        # prendiamo tutti gli appartamenti salvati nel db
        $apartments = Apartment::all();

        # prendiamo tutti gli sponsor salvati nel db
        $sponsors = Sponsor::all();

        #disablitiamo le restrizioni sulle foreign key
        Schema::disableForeignKeyConstraints();

        # creiamo un array vuoto da popolare
        $data = [];

        # cicliamo gli appartamenti

        $count = 0;
        foreach ($apartments as $apartment) {
            #sponsorizziamo solo 1 appartamento ogni 16
            if ($count % 16 === 0) {

                #selezioniamo una sponsorizzazione casuale
                $sponsor = $sponsors[random_int(0, count($sponsors) - 1)];

                # impostiamo l'inizio
                $start_time = Carbon::now();

                # l'end time corrisponde all'inizio + la durata della sottoscrizione
                $end_time = Carbon::now()->addHours($sponsor->duration);

                # salvo il nuovo record
                $apartment->sponsors()->attach($sponsor->id, [
                    'start_time' => $start_time,
                    'end_time' => $end_time,
                    'created_at' => $start_time,
                    'updated_at' => $start_time
                ]);
            }

            #incremento il contatore
            $count += 1;
        }

        DB::table('apartment_sponsor')->insert($data);

        Schema::enableForeignKeyConstraints();
    }
}
