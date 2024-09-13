<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $users = User::all();
        if (count($users) > 0) {

            $apartments = [
                [
                    'title' => 'Monolocale moderno vicino alla stazione',
                    'user_id' => $users[0]->id,
                    'description' => 'Monolocale arredato con tutti i comfort, situato a due passi dalla stazione centrale.',
                    'price' => 50,
                    'rooms' => 1,
                    'bathrooms' => 1,
                    'square_meters' => 40,
                    'address' => 'Via Torino 10, Milano',
                    'image' => 'https://living.corriere.it/wp-content/uploads/2022/03/03-monolocale-milano-archventil-livingcorriere.jpg',
                    'latitude' => 45.464203,
                    'longitude' => 9.189982,
                    'is_visible' => true,
                ],
                [
                    'title' => 'Ampio bilocale con giardino privato',
                    'user_id' => $users[0]->id,
                    'description' => 'Bilocale immerso nel verde, ideale per famiglie e coppie, con ampio giardino.',
                    'price' => 75,
                    'rooms' => 2,
                    'bathrooms' => 1,
                    'square_meters' => 65,
                    'address' => 'Via Garibaldi 8, Torino',
                    'image' => 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/473402943.jpg?k=c7b6ec72648fa50ecad48b8d97663e0bb21441b4c775205bc507cb5729edf220&o=&hp=1',
                    'latitude' => 45.070312,
                    'longitude' => 7.686856,
                    'is_visible' => true,
                ],
                [
                    'title' => 'Trilocale in zona tranquilla con parcheggio',
                    'user_id' => $users[0]->id,
                    'description' => 'Trilocale luminoso in zona residenziale, con parcheggio privato e terrazza.',
                    'price' => 100,
                    'rooms' => 3,
                    'bathrooms' => 2,
                    'square_meters' => 90,
                    'address' => 'Via del Parco 22, Bologna',
                    'image' => 'https://appartamento-a-due-passi-dalle-mura-con-parcheggio-2.hotelmix.it/data/Photos/OriginalPhoto/15015/1501564/1501564942/Appartamento-Con-Parcheggio-Privato-A-Lucca-Exterior.JPEG',
                    'latitude' => 44.494887,
                    'longitude' => 11.342616,
                    'is_visible' => true,
                ],
                [
                    'title' => 'Appartamento con terrazzo vista mare',
                    'user_id' => $users[0]->id,
                    'description' => 'Ampio appartamento con vista mozzafiato sul mare, terrazzo spazioso e arredato.',
                    'price' => 150,
                    'rooms' => 4,
                    'bathrooms' => 2,
                    'square_meters' => 120,
                    'address' => 'Via Lungomare 5, Napoli',
                    'image' => 'https://wips.plug.it/cips/initalia.virgilio.it/cms/2020/12/villa-la-pagoda-napoli.jpg',
                    'latitude' => 40.851775,
                    'longitude' => 14.268124,
                    'is_visible' => true,
                ],
                [
                    'title' => 'Attico lussuoso con piscina privata',
                    'user_id' => $users[0]->id,
                    'description' => 'Attico di lusso nel centro di Roma, con piscina privata e vista panoramica.',
                    'price' => 250,
                    'rooms' => 5,
                    'bathrooms' => 3,
                    'square_meters' => 200,
                    'address' => 'Piazza del Popolo 12, Roma',
                    'image' => 'https://www.aepiscine.com/wp-content/uploads/2016/11/IMG_3127-1170x878.jpg',
                    'latitude' => 41.902783,
                    'longitude' => 12.496366,
                    'is_visible' => true,
                ],
                [
                    'title' => 'Loft industriale nel cuore di Firenze',
                    'user_id' => $users[0]->id,
                    'description' => 'Loft in stile industriale con finiture di pregio, situato nel cuore di Firenze.',
                    'price' => 120,
                    'rooms' => 1,
                    'bathrooms' => 1,
                    'square_meters' => 75,
                    'address' => 'Via delle Calzaiuole 15, Firenze',
                    'image' => 'https://scontent-fco2-1.xx.fbcdn.net/v/t1.6435-9/174592068_2555245571297349_6131502047675613638_n.jpg?_nc_cat=106&ccb=1-7&_nc_sid=13d280&_nc_ohc=BgH727svg_UQ7kNvgFr5Z5s&_nc_ht=scontent-fco2-1.xx&_nc_gid=A40fGcLrPRGW_vC24Yc9QGS&oh=00_AYCY0Fybw2WKDnxyWqNnwP5gezhNCSUbW3Z9itBja5HLdg&oe=67078279',
                    'latitude' => 43.769560,
                    'longitude' => 11.255814,
                    'is_visible' => true,
                ],
                [
                    'title' => 'Monolocale moderno vicino alla stazione',
                    'user_id' => $users[0]->id,
                    'description' => 'Monolocale arredato con tutti i comfort, situato a due passi dalla stazione centrale.',
                    'price' => 50,
                    'rooms' => 1,
                    'bathrooms' => 1,
                    'square_meters' => 40,
                    'address' => 'Via Torino 10, Milano',
                    'image' => 'https://living.corriere.it/wp-content/uploads/2022/03/03-monolocale-milano-archventil-livingcorriere.jpg',
                    'latitude' => 45.464203,
                    'longitude' => 9.189982,
                    'is_visible' => true,
                ],
                [
                    'title' => 'Bilocale con vista sul Duomo',
                    'user_id' => $users[1]->id,
                    'description' => 'Bilocale spazioso con una splendida vista sul Duomo di Milano.',
                    'price' => 120,
                    'rooms' => 2,
                    'bathrooms' => 1,
                    'square_meters' => 70,
                    'address' => 'Piazza del Duomo 1, Milano',
                    'image' => 'https://living.corriere.it/wp-content/uploads/2022/03/02-bilocale-duomo-milano.jpg',
                    'latitude' => 45.464664,
                    'longitude' => 9.190109,
                    'is_visible' => true,
                ],
                [
                    'title' => 'Appartamento elegante in Brera',
                    'user_id' => $users[2]->id,
                    'description' => 'Appartamento di lusso situato nel cuore del quartiere artistico di Brera.',
                    'price' => 200,
                    'rooms' => 3,
                    'bathrooms' => 2,
                    'square_meters' => 100,
                    'address' => 'Via Brera 8, Milano',
                    'image' => 'https://living.corriere.it/wp-content/uploads/2022/03/01-appartamento-brera-milano.jpg',
                    'latitude' => 45.469290,
                    'longitude' => 9.186519,
                    'is_visible' => true,
                ],
                [
                    'title' => 'Loft spazioso in zona Navigli',
                    'user_id' => $users[3]->id,
                    'description' => 'Loft moderno e spazioso, ideale per giovani professionisti, situato sui Navigli.',
                    'price' => 150,
                    'rooms' => 2,
                    'bathrooms' => 1,
                    'square_meters' => 90,
                    'address' => 'Alzaia Naviglio Grande 22, Milano',
                    'image' => 'https://living.corriere.it/wp-content/uploads/2022/03/04-loft-navigli-milano.jpg',
                    'latitude' => 45.454134,
                    'longitude' => 9.170063,
                    'is_visible' => true,
                ],
                [
                    'title' => 'Trilocale con terrazza in Porta Romana',
                    'user_id' => $users[4]->id,
                    'description' => 'Trilocale moderno con ampia terrazza, situato in zona Porta Romana.',
                    'price' => 180,
                    'rooms' => 3,
                    'bathrooms' => 2,
                    'square_meters' => 110,
                    'address' => 'Corso di Porta Romana 43, Milano',
                    'image' => 'https://living.corriere.it/wp-content/uploads/2022/03/05-trilocale-porta-romana-milano.jpg',
                    'latitude' => 45.453964,
                    'longitude' => 9.191162,
                    'is_visible' => true,
                ],
                [
                    'title' => 'Monolocale accogliente in zona Isola',
                    'user_id' => $users[5]->id,
                    'description' => 'Monolocale recentemente ristrutturato, ideale per studenti o giovani coppie.',
                    'price' => 75,
                    'rooms' => 1,
                    'bathrooms' => 1,
                    'square_meters' => 35,
                    'address' => 'Via Garigliano 7, Milano',
                    'image' => 'https://living.corriere.it/wp-content/uploads/2022/03/06-monolocale-isola-milano.jpg',
                    'latitude' => 45.489072,
                    'longitude' => 9.187720,
                    'is_visible' => true,
                ],
                [
                    'title' => 'Appartamento panoramico vicino al Castello Sforzesco',
                    'user_id' => $users[6]->id,
                    'description' => 'Appartamento con vista panoramica sul Castello Sforzesco e il Parco Sempione.',
                    'price' => 170,
                    'rooms' => 3,
                    'bathrooms' => 2,
                    'square_meters' => 95,
                    'address' => 'Via Luca Beltrami 5, Milano',
                    'image' => 'https://living.corriere.it/wp-content/uploads/2022/03/07-appartamento-castello-sforzesco.jpg',
                    'latitude' => 45.469722,
                    'longitude' => 9.179444,
                    'is_visible' => true,
                ],
                [
                    'title' => 'Bilocale moderno in zona Porta Garibaldi',
                    'user_id' => $users[7]->id,
                    'description' => 'Bilocale arredato in stile moderno, situato in prossimità di Porta Garibaldi.',
                    'price' => 130,
                    'rooms' => 2,
                    'bathrooms' => 1,
                    'square_meters' => 65,
                    'address' => 'Corso Como 10, Milano',
                    'image' => 'https://living.corriere.it/wp-content/uploads/2022/03/08-bilocale-porta-garibaldi-milano.jpg',
                    'latitude' => 45.481476,
                    'longitude' => 9.187491,
                    'is_visible' => true,
                ],
            ];

            foreach ($apartments as $apartment_data) {
                Apartment::create($apartment_data);
            }
        } else {
            echo ('Non ci sono utenti nel DB, impossibile generare gli appartamenti!');
            return;
        }
    }
}
