<?php

namespace Database\Seeders;

use App\Models\Sponsor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        $seedingData = [
            [
                'title' => 'Base',
                'duration' => 24,
                'price' => 2.99
            ],
            [
                'title' => 'Intermedio',
                'duration' => 72,
                'price' => 5.99
            ],
            [
                'title' => 'Pro',
                'duration' => 144,
                'price' => 9.99
            ]
        ];

        foreach ($seedingData as $data) {

            $sponsor = new Sponsor();
            $sponsor->title = $data['title'];
            $sponsor->duration = $data['duration'];
            $sponsor->price = $data['price'];
            $sponsor->save();
        }
    }
}
