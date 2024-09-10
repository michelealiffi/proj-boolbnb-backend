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
        foreach ($apartments as $apartment) {
            #per ogni appartamento cicliamo gli sponsor
            foreach ($sponsors as $sponsor) {
                if (random_int(0, 1) === 0) {
                    $start_time = Carbon::now()->subDays(random_int(1, 3));
                    $end_time = Carbon::now()->addDays(random_int(1, 3));

                    array_push($data, [
                        'apartment_id' => $apartment->id,
                        'sponsor_id' => $sponsor->id,
                        'start_time' => $start_time,
                        'end_time' => $end_time
                    ]);
                }
            }
        }

        DB::table('apartment_sponsor')->insert($data);

        Schema::enableForeignKeyConstraints();
    }
}
