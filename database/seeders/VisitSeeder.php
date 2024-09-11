<?php

namespace Database\Seeders;

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

        Schema::disableForeignKeyConstraints();

        DB::table('visits')->insert([
            [
                'apartment_id' => 1,
                'ip_address' => '192.168.0.1',
            ],
            [
                'apartment_id' => 2,
                'ip_address' => '192.168.0.2',
            ],
            [
                'apartment_id' => 3,
                'ip_address' => '192.168.0.3',
            ],
            [
                'apartment_id' => 4,
                'ip_address' => '192.168.0.4',
            ],
            [
                'apartment_id' => 5,
                'ip_address' => '192.168.0.5',
            ],
            [
                'apartment_id' => 6,
                'ip_address' => '192.168.0.6',
            ],
            [
                'apartment_id' => 7,
                'ip_address' => '192.168.0.7',
            ],
            [
                'apartment_id' => 8,
                'ip_address' => '192.168.0.8',
            ],
            [
                'apartment_id' => 9,
                'ip_address' => '192.168.0.9',
            ],
            [
                'apartment_id' => 10,
                'ip_address' => '192.168.0.10',
            ],
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
