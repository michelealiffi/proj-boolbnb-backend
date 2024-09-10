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
            ['name' => 'Wi-Fi', 'icon_name' => 'fas fa-wifi'],
            ['name' => 'Parcheggio', 'icon_name' => 'fas fa-parking'],
            ['name' => 'Piscina', 'icon_name' => 'fas fa-swimming-pool'],
            ['name' => 'Climatizzazione', 'icon_name' => 'fas fa-snowflake'],
            ['name' => 'Colazione Inclusa', 'icon_name' => 'fas fa-coffee'],
            ['name' => 'Animali Ammessi', 'icon_name' => 'fas fa-paw'],
        ]);
    }
}
