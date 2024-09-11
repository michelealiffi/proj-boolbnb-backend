<?php

namespace Database\Seeders;

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

            Schema::disableForeignKeyConstraints();

            DB::table('apartments')->insert([
                [
                    'title' => 'Monolocale moderno vicino alla stazione',
                    'user_id' => $users[0]->id,
                    'slug' => 'monolocale-moderno-vicino-alla-stazione',
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
                    'slug' => 'ampio-bilocale-con-giardino-privato',
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
                    'slug' => 'trilocale-in-zona-tranquilla-con-parcheggio',
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
                    'slug' => 'appartamento-con-terrazzo-vista-mare',
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
                    'slug' => 'attico-lussuoso-con-piscina-privata',
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
                    'slug' => 'loft-industriale-nel-cuore-di-firenze',
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
            ]);

            Schema::enableForeignKeyConstraints();
        } else {
            echo ('Non ci sono utenti nel DB, impossibile generare gli appartamenti!');
            return;
        }
    }
}
