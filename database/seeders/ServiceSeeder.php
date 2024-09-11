<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('services')->insert([
            ['name' => 'Wi-Fi', 'icon_name' => 'fa-solid fa-wifi'],
            ['name' => 'Parcheggio', 'icon_name' => 'fa-solid fa-parking'],
            ['name' => 'Piscina', 'icon_name' => 'fa-solid fa-swimming-pool'],
            ['name' => 'Climatizzazione', 'icon_name' => 'fa-solid fa-snowflake'],
            ['name' => 'Colazione Inclusa', 'icon_name' => 'fa-solid fa-coffee'],
            ['name' => 'Animali Ammessi', 'icon_name' => 'fa-solid fa-paw'],
        ]);
    }
}
