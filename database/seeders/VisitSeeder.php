<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Visit;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class VisitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {

        $max_visits = 100;
        $min_visits = 80;
        $apartments = Apartment::all();
        $default_ip = "1.1.1.1";

        echo ("Generando le visite.");
        foreach ($apartments as $apartment) {
            echo (".");
            $visits = [];
            for ($i = 0; $i < random_int($min_visits, $max_visits); $i++) {
                $random_date = Carbon::now()->subMonths(random_int(1, 6));
                $visits[] = new Visit(['created_at' => $random_date, 'updated_at' => $random_date, 'ip_address' => $default_ip]);
            }
            $apartment->visits()->saveMany($visits);
        }
        echo ("\n");
    }
}
