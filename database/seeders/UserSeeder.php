<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $seedingData = [
            [
                'name' => 'Alice',
                'surname' => 'Rossi',
                'email' => 'alice.rossi@example.com',
                'birthdate' => '1985-03-15',
            ],
            [
                'name' => 'Luca',
                'surname' => 'Bianchi',
                'email' => 'luca.bianchi@example.com',
                'birthdate' => '1988-07-22',
            ],
            [
                'name' => 'Giulia',
                'surname' => 'Verdi',
                'email' => 'giulia.verdi@example.com',
                'birthdate' => '1992-10-10',
            ],
            [
                'name' => 'Marco',
                'surname' => 'Esposito',
                'email' => 'marco.esposito@example.com',
                'birthdate' => '1995-04-05',
            ],
            [
                'name' => 'Francesca',
                'surname' => 'Romano',
                'email' => 'francesca.romano@example.com',
                'birthdate' => '1990-06-20',
            ],
            [
                'name' => 'Andrea',
                'surname' => 'Ferrari',
                'email' => 'andrea.ferrari@example.com',
                'birthdate' => '1987-11-30',
            ],
            [
                'name' => 'Martina',
                'surname' => 'Gallo',
                'email' => 'martina.gallo@example.com',
                'birthdate' => '1991-08-08',
            ],
            [
                'name' => 'Davide',
                'surname' => 'Conti',
                'email' => 'davide.conti@example.com',
                'birthdate' => '1983-12-12',
            ],
            [
                'name' => 'Elena',
                'surname' => 'Ricci',
                'email' => 'elena.ricci@example.com',
                'birthdate' => '1994-05-25',
            ],
            [
                'name' => 'Stefano',
                'surname' => 'Moretti',
                'email' => 'stefano.moretti@example.com',
                'birthdate' => '1989-09-18',
            ]
        ];

        foreach ($seedingData as $data) {

            $user = new User();
            $user->name = $data['name'];
            $user->surname = $data['surname'];
            $user->email = $data['email'];
            $user->birthdate = $data['birthdate'];
            $user->email_verified_at = now();
            $user->password = Hash::make('password123');
            $user->remember_token = Str::random(10);
            $user->created_at = now();
            $user->updated_at = now();

            $user->save();
        }
    }
}
