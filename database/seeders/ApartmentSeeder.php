<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\User;
use Exception;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $users = User::all();
        $users_count = count($users);

        if ($users_count > 0) {


            // DATI PER GLI APPARTAMENTI
            $apartments = [
                [
                    'title' => 'Monolocale moderno vicino alla stazione',
                    'description' => 'Monolocale arredato con tutti i comfort, situato a due passi dalla stazione centrale.',
                    'address' => 'Via Torino 10, Milano',
                    'latitude' => 45.464203,
                    'longitude' => 9.189982,
                ],
                [
                    'title' => 'Bilocale elegante in centro a Roma',
                    'description' => 'Bilocale spazioso e luminoso, ideale per una fuga romantica nel cuore di Roma.',
                    'address' => 'Piazza Navona, Roma',
                    'latitude' => 41.898056,
                    'longitude' => 12.473101,
                ],
                [
                    'title' => 'Trilocale con vista sul Vesuvio',
                    'description' => 'Trilocale con vista panoramica, perfetto per famiglie in visita a Napoli.',
                    'address' => 'Via Partenope, Napoli',
                    'latitude' => 40.837848,
                    'longitude' => 14.248783,
                ],
                [
                    'title' => 'Appartamento storico a Palermo',
                    'description' => 'Appartamento elegante in un palazzo d’epoca nel centro di Palermo.',
                    'address' => 'Via Vittorio Emanuele, Palermo',
                    'latitude' => 38.115556,
                    'longitude' => 13.361389,
                ],
                [
                    'title' => 'Loft moderno in zona Navigli',
                    'description' => 'Loft affascinante e spazioso, perfetto per giovani professionisti.',
                    'address' => 'Alzaia Naviglio Grande, Milano',
                    'latitude' => 45.454134,
                    'longitude' => 9.170063,
                ],
                [
                    'title' => 'Monolocale accogliente a Trastevere',
                    'description' => 'Monolocale ben arredato, situato nel caratteristico quartiere di Trastevere.',
                    'address' => 'Via della Lungara, Roma',
                    'latitude' => 41.890251,
                    'longitude' => 12.467321,
                ],
                [
                    'title' => 'Appartamento con terrazza a Mondello',
                    'description' => 'Appartamento con terrazza, a pochi passi dalla spiaggia di Mondello.',
                    'address' => 'Via Piano di Gallo, Palermo',
                    'latitude' => 38.155555,
                    'longitude' => 13.359722,
                ],
                [
                    'title' => 'Bilocale luminoso in zona Chiaia',
                    'description' => 'Bilocale elegante con vista sul mare, in una delle zone più belle di Napoli.',
                    'address' => 'Via Chiaia, Napoli',
                    'latitude' => 40.837526,
                    'longitude' => 14.247569,
                ],
                [
                    'title' => 'Trilocale moderno a Porta Romana',
                    'description' => 'Trilocale spazioso con cucina attrezzata, ideale per famiglie o gruppi.',
                    'address' => 'Corso di Porta Romana, Milano',
                    'latitude' => 45.453964,
                    'longitude' => 9.191162,
                ],
                [
                    'title' => 'Monolocale a San Giovanni',
                    'description' => 'Monolocale in una zona tranquilla, a pochi passi dalla Basilica di San Giovanni.',
                    'address' => 'Via Appia Nuova, Roma',
                    'latitude' => 41.869174,
                    'longitude' => 12.510021,
                ],
                [
                    'title' => 'Attico con vista a Roma',
                    'description' => 'Attico di lusso con terrazza panoramica, ideale per una fuga romantica.',
                    'address' => 'Via dei Banchi Vecchi, Roma',
                    'latitude' => 41.895375,
                    'longitude' => 12.458966,
                ],
                [
                    'title' => 'Appartamento elegante a Palermo',
                    'description' => 'Appartamento luminoso nel centro di Palermo, vicino ai ristoranti.',
                    'address' => 'Corso Vittorio Emanuele, Palermo',
                    'latitude' => 38.115111,
                    'longitude' => 13.361139,
                ],
                [
                    'title' => 'Appartamento elegante a Milano',
                    'description' => 'Appartamento di lusso nel cuore di Milano, vicino al Duomo.',
                    'address' => 'Via del Corso, Milano',
                    'latitude' => 45.464211,
                    'longitude' => 9.191383,
                ],
                [
                    'title' => 'Trilocale a Roma con vista Colosseo',
                    'description' => 'Spazioso trilocale con vista sul Colosseo, ideale per famiglie.',
                    'address' => 'Via dei Fori Imperiali, Roma',
                    'latitude' => 41.890210,
                    'longitude' => 12.492231,
                ],
                [
                    'title' => 'Bilocale accogliente a Napoli',
                    'description' => 'Bilocale in una zona tranquilla di Napoli, ideale per una fuga romantica.',
                    'address' => 'Via Sant\'Elmo, Napoli',
                    'latitude' => 40.844678,
                    'longitude' => 14.252779,
                ],
                [
                    'title' => 'Monolocale ristrutturato a Palermo',
                    'description' => 'Monolocale recentemente ristrutturato, situato in centro.',
                    'address' => 'Via Libertà, Palermo',
                    'latitude' => 38.116204,
                    'longitude' => 13.371227,
                ],
                [
                    'title' => 'Attico con terrazza a Roma',
                    'description' => 'Attico con terrazza panoramica, perfetto per cene all\'aperto.',
                    'address' => 'Via della Lungara, Roma',
                    'latitude' => 41.887428,
                    'longitude' => 12.463201,
                ],
                [
                    'title' => 'Trilocale moderno a Napoli',
                    'description' => 'Trilocale moderno con cucina attrezzata, ideale per famiglie.',
                    'address' => 'Via Cristoforo Colombo, Napoli',
                    'latitude' => 40.839444,
                    'longitude' => 14.266883,
                ],
                [
                    'title' => 'Bilocale vicino al mare a Palermo',
                    'description' => 'Bilocale a pochi passi dalla spiaggia, perfetto per le vacanze.',
                    'address' => 'Lungomare Cristoforo Colombo, Palermo',
                    'latitude' => 38.145709,
                    'longitude' => 13.359764,
                ],
                [
                    'title' => 'Monolocale con angolo cottura a Milano',
                    'description' => 'Monolocale con angolo cottura, situato in una zona vivace di Milano.',
                    'address' => 'Via della Moscova, Milano',
                    'latitude' => 45.479154,
                    'longitude' => 9.185813,
                ],
                [
                    'title' => 'Appartamento vintage a Roma',
                    'description' => 'Appartamento in stile vintage, situato in una zona storica.',
                    'address' => 'Via Giulia, Roma',
                    'latitude' => 41.894967,
                    'longitude' => 12.468418,
                ],
                [
                    'title' => 'Trilocale con vista mare a Napoli',
                    'description' => 'Trilocale con vista sul Golfo di Napoli, ideale per famiglie.',
                    'address' => 'Via Posillipo, Napoli',
                    'latitude' => 40.834975,
                    'longitude' => 14.208223,
                ],
                [
                    'title' => 'Bilocale raffinato a Palermo',
                    'description' => 'Bilocale raffinato con design moderno e comfort.',
                    'address' => 'Via Montalbo, Palermo',
                    'latitude' => 38.127103,
                    'longitude' => 13.365439,
                ],
                [
                    'title' => 'Monolocale centrale a Milano',
                    'description' => 'Monolocale situato nel cuore di Milano, vicino ai mezzi pubblici.',
                    'address' => 'Piazza San Babila, Milano',
                    'latitude' => 45.202445,
                    'longitude' => 9.188978,
                ],
                [
                    'title' => 'Appartamento con giardino a Roma',
                    'description' => 'Spazioso appartamento con giardino privato, ideale per famiglie.',
                    'address' => 'Via Appia Antica, Roma',
                    'latitude' => 41.873879,
                    'longitude' => 12.511913,
                ],
                [
                    'title' => 'Bilocale a Napoli con vista sul Vesuvio',
                    'description' => 'Bilocale con vista sul Vesuvio, perfetto per una fuga romantica.',
                    'address' => 'Corso Vittorio Emanuele, Napoli',
                    'latitude' => 40.839971,
                    'longitude' => 14.250931,
                ],
                [
                    'title' => 'Monolocale con balcone a Palermo',
                    'description' => 'Monolocale accogliente con balcone, situato in centro città.',
                    'address' => 'Via Ruggero Settimo, Palermo',
                    'latitude' => 38.115082,
                    'longitude' => 13.363253,
                ],
                [
                    'title' => 'Attico panoramico a Milano',
                    'description' => 'Attico con vista panoramica su Milano, ideale per eventi.',
                    'address' => 'Piazza Gae Aulenti, Milano',
                    'latitude' => 45.485903,
                    'longitude' => 9.197287,
                ],
                [
                    'title' => 'Trilocale in centro a Roma',
                    'description' => 'Trilocale situato nel cuore di Roma, vicino a tutte le attrazioni.',
                    'address' => 'Via del Pantheon, Roma',
                    'latitude' => 41.898692,
                    'longitude' => 12.476832,
                ],
                [
                    'title' => 'Bilocale moderno a Napoli',
                    'description' => 'Bilocale con design moderno, situato vicino al centro.',
                    'address' => 'Via Toledo, Napoli',
                    'latitude' => 40.839710,
                    'longitude' => 14.250450,
                ],
                [
                    'title' => 'Appartamento artistico a Palermo',
                    'description' => 'Appartamento con decorazioni artistiche, ideale per gli amanti dell\'arte.',
                    'address' => 'Via Cavour, Palermo',
                    'latitude' => 38.113700,
                    'longitude' => 13.363092,
                ],
                [
                    'title' => 'Monolocale a Milano con cucina',
                    'description' => 'Monolocale con cucina attrezzata, ideale per soggiorni prolungati.',
                    'address' => 'Via della Moscova, Milano',
                    'latitude' => 45.482066,
                    'longitude' => 9.185321,
                ],
                [
                    'title' => 'Trilocale storico a Roma',
                    'description' => 'Trilocale situato in un palazzo storico, vicino a Piazza Navona.',
                    'address' => 'Via della Pace, Roma',
                    'latitude' => 41.898905,
                    'longitude' => 12.471215,
                ],
                [
                    'title' => 'Bilocale elegante a Napoli',
                    'description' => 'Bilocale elegante con finiture di pregio, ideale per soggiorni di lusso.',
                    'address' => 'Via Chiaia, Napoli',
                    'latitude' => 40.837338,
                    'longitude' => 14.251132,
                ],
                [
                    'title' => 'Monolocale moderno a Palermo',
                    'description' => 'Monolocale con arredi moderni e comfort, situato in una zona centrale.',
                    'address' => 'Via Roma, Palermo',
                    'latitude' => 38.115084,
                    'longitude' => 13.361553,
                ],
                [
                    'title' => 'Trilocale con terrazza a Roma',
                    'description' => 'Trilocale con terrazza panoramica, ideale per cene all\'aperto.',
                    'address' => 'Via del Viminale, Roma',
                    'latitude' => 41.894355,
                    'longitude' => 12.496227,
                ],
                [
                    'title' => 'Bilocale con vista su Castel dell\'Ovo a Napoli',
                    'description' => 'Bilocale con vista spettacolare sul mare e sul castello.',
                    'address' => 'Via Eldorado, Napoli',
                    'latitude' => 40.837053,
                    'longitude' => 14.236623,
                ],
                [
                    'title' => 'Attico lussuoso a Milano',
                    'description' => 'Attico di lusso con vista mozzafiato sulla città, perfetto per eventi.',
                    'address' => 'Corso Venezia, Milano',
                    'latitude' => 45.479780,
                    'longitude' => 9.200144,
                ],
                [
                    'title' => 'Monolocale accogliente a Roma',
                    'description' => 'Monolocale accogliente e ben arredato, situato in una zona tranquilla.',
                    'address' => 'Via dei Fienaroli, Roma',
                    'latitude' => 41.883114,
                    'longitude' => 12.467876,
                ],
                [
                    'title' => 'Trilocale in zona San Gregorio Armeno a Napoli',
                    'description' => 'Trilocale in una delle zone più caratteristiche di Napoli.',
                    'address' => 'Via San Gregorio Armeno, Napoli',
                    'latitude' => 40.853314,
                    'longitude' => 14.266467,
                ],
                [
                    'title' => 'Bilocale in centro a Palermo',
                    'description' => 'Bilocale situato nel cuore di Palermo, vicino ai principali monumenti.',
                    'address' => 'Via Maqueda, Palermo',
                    'latitude' => 38.114506,
                    'longitude' => 13.360938,
                ],
                [
                    'title' => 'Appartamento storico a Milano',
                    'description' => 'Appartamento in un palazzo storico, vicino al Castello Sforzesco.',
                    'address' => 'Piazza Castello, Milano',
                    'latitude' => 45.466520,
                    'longitude' => 9.183035,
                ],
                [
                    'title' => 'Monolocale chic a Roma',
                    'description' => 'Monolocale elegante con arredi chic, ideale per coppie.',
                    'address' => 'Via del Boccaccio, Roma',
                    'latitude' => 41.904438,
                    'longitude' => 12.456162,
                ],
                [
                    'title' => 'Appartamento moderno a Napoli',
                    'description' => 'Appartamento moderno con tutti i comfort, situato nel centro.',
                    'address' => 'Via dei Tribunali, Napoli',
                    'latitude' => 40.846641,
                    'longitude' => 14.255245,
                ],
                [
                    'title' => 'Attico con vista a Palermo',
                    'description' => 'Attico con vista sul mare, perfetto per una fuga romantica.',
                    'address' => 'Via Libertà, Palermo',
                    'latitude' => 38.132478,
                    'longitude' => 13.366129,
                ],
                [
                    'title' => 'Bilocale in zona Trastevere a Roma',
                    'description' => 'Bilocale caratteristico a Trastevere, vicino a ristoranti e bar.',
                    'address' => 'Piazza di Santa Maria in Trastevere, Roma',
                    'latitude' => 41.888097,
                    'longitude' => 12.466292,
                ],
                [
                    'title' => 'Trilocale in zona Chiaia a Napoli',
                    'description' => 'Trilocale elegante e spazioso, vicino al lungomare.',
                    'address' => 'Via Chiaia, Napoli',
                    'latitude' => 40.842991,
                    'longitude' => 14.251509,
                ],
                [
                    'title' => 'Monolocale con terrazzo a Milano',
                    'description' => 'Monolocale con terrazzo privato, ideale per aperitivi all\'aperto.',
                    'address' => 'Via della Moscova, Milano',
                    'latitude' => 45.482066,
                    'longitude' => 9.183535,
                ],
                [
                    'title' => 'Appartamento con giardino a Roma',
                    'description' => 'Appartamento con giardino privato, ideale per famiglie.',
                    'address' => 'Via dell\'Appia Nuova, Roma',
                    'latitude' => 41.876980,
                    'longitude' => 12.509909,
                ],
                [
                    'title' => 'Monolocale centrale a Napoli',
                    'description' => 'Monolocale situato nel centro di Napoli, comodo per esplorare la città.',
                    'address' => 'Via Santa Lucia, Napoli',
                    'latitude' => 40.837898,
                    'longitude' => 14.247597,
                ],
                [
                    'title' => 'Attico elegante a Palermo',
                    'description' => 'Attico elegante con arredi di design, situato in una zona esclusiva.',
                    'address' => 'Piazza Politeama, Palermo',
                    'latitude' => 38.113840,
                    'longitude' => 13.371478,
                ],
                [
                    'title' => 'Bilocale luminoso a Milano',
                    'description' => 'Bilocale luminoso con ampie finestre e vista sulla città.',
                    'address' => 'Corso Buenos Aires, Milano',
                    'latitude' => 45.485721,
                    'longitude' => 9.209128,
                ],
                [
                    'title' => 'Trilocale in zona Testaccio a Roma',
                    'description' => 'Trilocale situato nel vivace quartiere Testaccio, famoso per la sua cucina.',
                    'address' => 'Via Marmorata, Roma',
                    'latitude' => 41.878368,
                    'longitude' => 12.473208,
                ],
                [
                    'title' => 'Monolocale con vista mare a Napoli',
                    'description' => 'Monolocale con vista sul Golfo di Napoli, ideale per una fuga romantica.',
                    'address' => 'Via Posillipo, Napoli',
                    'latitude' => 40.833156,
                    'longitude' => 14.216439,
                ],
                [
                    'title' => 'Appartamento con piscina a Palermo',
                    'description' => 'Appartamento elegante con piscina privata, ideale per relax.',
                    'address' => 'Via dell\'Olimpo, Palermo',
                    'latitude' => 38.120147,
                    'longitude' => 13.343492,
                ],
                [
                    'title' => 'Trilocale in zona San Giovanni a Roma',
                    'description' => 'Trilocale spazioso e moderno, vicino alla Basilica di San Giovanni.',
                    'address' => 'Piazza San Giovanni in Laterano, Roma',
                    'latitude' => 41.896709,
                    'longitude' => 12.512449,
                ],
                [
                    'title' => 'Monolocale in zona Vomero a Napoli',
                    'description' => 'Monolocale moderno e ben arredato, in una zona tranquilla.',
                    'address' => 'Via Cilea, Napoli',
                    'latitude' => 40.849490,
                    'longitude' => 14.221751,
                ],
                [
                    'title' => 'Attico con terrazzo a Milano',
                    'description' => 'Attico con grande terrazzo e vista sulla skyline di Milano.',
                    'address' => 'Piazza della Repubblica, Milano',
                    'latitude' => 45.484305,
                    'longitude' => 9.193234,
                ],
                [
                    'title' => 'Bilocale in zona Campo dei Fiori a Roma',
                    'description' => 'Bilocale situato nel cuore di Roma, vicino ai mercati.',
                    'address' => 'Piazza Campo de\' Fiori, Roma',
                    'latitude' => 41.895194,
                    'longitude' => 12.466070,
                ],
                [
                    'title' => 'Trilocale con vista a Napoli',
                    'description' => 'Trilocale con vista sul mare e sul Vesuvio.',
                    'address' => 'Via Santa Teresa, Napoli',
                    'latitude' => 40.836224,
                    'longitude' => 14.251455,
                ],
                [
                    'title' => 'Monolocale elegante a Palermo',
                    'description' => 'Monolocale elegante con arredi moderni, situato in una zona centrale.',
                    'address' => 'Via Libertà, Palermo',
                    'latitude' => 38.125645,
                    'longitude' => 13.370612,
                ],
                [
                    'title' => 'Appartamento ristrutturato a Milano',
                    'description' => 'Appartamento ristrutturato con finiture di alta qualità.',
                    'address' => 'Via Monte Napoleone, Milano',
                    'latitude' => 45.465447,
                    'longitude' => 9.195242,
                ],
                [
                    'title' => 'Trilocale a Trastevere a Roma',
                    'description' => 'Trilocale situato in uno dei quartieri più vivaci di Roma.',
                    'address' => 'Via della Scala, Roma',
                    'latitude' => 41.889222,
                    'longitude' => 12.471489,
                ],
                [
                    'title' => 'Monolocale con balcone a Napoli',
                    'description' => 'Monolocale con balcone e vista sul centro storico di Napoli.',
                    'address' => 'Via Foria, Napoli',
                    'latitude' => 40.855030,
                    'longitude' => 14.263252,
                ],
                [
                    'title' => 'Attico moderno a Palermo',
                    'description' => 'Attico moderno con vista panoramica sulla città e sul mare.',
                    'address' => 'Via Giovanni Meli, Palermo',
                    'latitude' => 38.115176,
                    'longitude' => 13.368029,
                ],
                [
                    'title' => 'Bilocale vicino al Colosseo a Roma',
                    'description' => 'Bilocale con vista sul Colosseo, perfetto per turisti.',
                    'address' => 'Via dei Serpenti, Roma',
                    'latitude' => 41.894744,
                    'longitude' => 12.481885,
                ],
                [
                    'title' => 'Trilocale a Posillipo a Napoli',
                    'description' => 'Trilocale con vista mozzafiato sul mare, in una zona esclusiva.',
                    'address' => 'Via Posillipo, Napoli',
                    'latitude' => 40.833800,
                    'longitude' => 14.224847,
                ],
                [
                    'title' => 'Monolocale in zona Garibaldi a Milano',
                    'description' => 'Monolocale in una zona centrale, vicino a negozi e ristoranti.',
                    'address' => 'Piazza Garibaldi, Milano',
                    'latitude' => 45.484651,
                    'longitude' => 9.197809,
                ],
                [
                    'title' => 'Appartamento storico a Roma',
                    'description' => 'Appartamento in un palazzo storico, con soffitti affrescati.',
                    'address' => 'Via del Corso, Roma',
                    'latitude' => 41.902917,
                    'longitude' => 12.476233,
                ],
                [
                    'title' => 'Monolocale in centro a Napoli',
                    'description' => 'Monolocale situato nel cuore di Napoli, a pochi passi da tutto.',
                    'address' => 'Via Toledo, Napoli',
                    'latitude' => 40.840305,
                    'longitude' => 14.253455,
                ],
                [
                    'title' => 'Attico con vista giardino a Palermo',
                    'description' => 'Attico con grande terrazzo e vista su un bellissimo giardino.',
                    'address' => 'Via Pindemonte, Palermo',
                    'latitude' => 38.121221,
                    'longitude' => 13.354817,
                ],
                [
                    'title' => 'Bilocale moderno a Milano',
                    'description' => 'Bilocale moderno con tutti i comfort, in una zona trendy.',
                    'address' => 'Corso Como, Milano',
                    'latitude' => 45.485189,
                    'longitude' => 9.188007,
                ],
                [
                    'title' => 'Trilocale in zona Monteverde a Roma',
                    'description' => 'Trilocale spazioso e luminoso, ideale per famiglie.',
                    'address' => 'Via di Villa Pamphili, Roma',
                    'latitude' => 41.878166,
                    'longitude' => 12.467829,
                ],
                [
                    'title' => 'Monolocale con vista Vesuvio a Napoli',
                    'description' => 'Monolocale con vista sul Vesuvio, ideale per amanti della natura.',
                    'address' => 'Via Vesuvio, Napoli',
                    'latitude' => 40.835568,
                    'longitude' => 14.253124,
                ],
                [
                    'title' => 'Appartamento lussuoso a Palermo',
                    'description' => 'Appartamento lussuoso con arredi eleganti e vista mare.',
                    'address' => 'Via Vittorio Emanuele, Palermo',
                    'latitude' => 38.115497,
                    'longitude' => 13.361877,
                ],
                [
                    'title' => 'Bilocale a Trastevere a Roma',
                    'description' => 'Bilocale caratteristico in uno dei quartieri più affascinanti di Roma.',
                    'address' => 'Piazza Trilussa, Roma',
                    'latitude' => 41.889889,
                    'longitude' => 12.466868,
                ],
                [
                    'title' => 'Trilocale in zona Vomero a Napoli',
                    'description' => 'Trilocale con vista panoramica, ideale per famiglie.',
                    'address' => 'Via Cimarosa, Napoli',
                    'latitude' => 40.847350,
                    'longitude' => 14.227703,
                ],
                [
                    'title' => 'Monolocale elegante a Milano',
                    'description' => 'Monolocale elegante e moderno, situato nel centro di Milano.',
                    'address' => 'Corso Buenos Aires, Milano',
                    'latitude' => 45.487196,
                    'longitude' => 9.208062,
                ],
                [
                    'title' => 'Attico panoramico a Roma',
                    'description' => 'Attico con terrazzo panoramico, perfetto per eventi.',
                    'address' => 'Via dei Giubbonari, Roma',
                    'latitude' => 41.893220,
                    'longitude' => 12.475209,
                ],
                [
                    'title' => 'Monolocale con giardino a Napoli',
                    'description' => 'Monolocale con accesso a un giardino privato.',
                    'address' => 'Via Francesco Caracciolo, Napoli',
                    'latitude' => 40.847776,
                    'longitude' => 14.243155,
                ],
                [
                    'title' => 'Appartamento storico a Palermo',
                    'description' => 'Appartamento in un palazzo storico, ricco di fascino.',
                    'address' => 'Via Maqueda, Palermo',
                    'latitude' => 38.115938,
                    'longitude' => 13.358888,
                ],
                [
                    'title' => 'Bilocale in zona Brera a Milano',
                    'description' => 'Bilocale raffinato nel cuore del quartiere Brera.',
                    'address' => 'Via Brera, Milano',
                    'latitude' => 45.469278,
                    'longitude' => 9.186223,
                ],
                [
                    'title' => 'Trilocale a San Lorenzo a Roma',
                    'description' => 'Trilocale spazioso, vicino all\'Università.',
                    'address' => 'Via dei Sabelli, Roma',
                    'latitude' => 41.894802,
                    'longitude' => 12.512037,
                ],
                [
                    'title' => 'Monolocale vicino alla spiaggia a Napoli',
                    'description' => 'Monolocale a pochi passi dalla spiaggia.',
                    'address' => 'Via Posillipo, Napoli',
                    'latitude' => 40.833800,
                    'longitude' => 14.224847,
                ],
                [
                    'title' => 'Appartamento con terrazzo a Palermo',
                    'description' => 'Appartamento con ampio terrazzo e vista sulla città.',
                    'address' => 'Via Roma, Palermo',
                    'latitude' => 38.115290,
                    'longitude' => 13.361905,
                ],
                [
                    'title' => 'Bilocale in zona Testaccio a Roma',
                    'description' => 'Bilocale accogliente in una delle zone più vivaci di Roma.',
                    'address' => 'Via Marmorata, Roma',
                    'latitude' => 41.878376,
                    'longitude' => 12.467167,
                ],
                [
                    'title' => 'Trilocale con vista mare a Napoli',
                    'description' => 'Trilocale con vista sul Golfo di Napoli, perfetto per famiglie.',
                    'address' => 'Via Posillipo, Napoli',
                    'latitude' => 40.835900,
                    'longitude' => 14.228154,
                ],
                [
                    'title' => 'Monolocale chic a Milano',
                    'description' => 'Monolocale elegante in una zona esclusiva di Milano.',
                    'address' => 'Via della Spiga, Milano',
                    'latitude' => 45.466462,
                    'longitude' => 9.194775,
                ],
                [
                    'title' => 'Attico con piscina a Roma',
                    'description' => 'Attico di lusso con piscina privata e vista spettacolare.',
                    'address' => 'Via di Valle Aurelia, Roma',
                    'latitude' => 41.878071,
                    'longitude' => 12.440802,
                ],
                [
                    'title' => 'Monolocale a Chiaia a Napoli',
                    'description' => 'Monolocale elegante, situato nel quartiere Chiaia.',
                    'address' => 'Via Chiaia, Napoli',
                    'latitude' => 40.835998,
                    'longitude' => 14.243557,
                ],
                [
                    'title' => 'Appartamento con vista a Palermo',
                    'description' => 'Appartamento luminoso con vista sulla città e sul mare.',
                    'address' => 'Via dell\'Orologio, Palermo',
                    'latitude' => 38.115620,
                    'longitude' => 13.359400,
                ],
                [
                    'title' => 'Bilocale in zona Sempione a Milano',
                    'description' => 'Bilocale moderno vicino al Parco Sempione.',
                    'address' => 'Piazza Sempione, Milano',
                    'latitude' => 45.479193,
                    'longitude' => 9.175491,
                ],
                [
                    'title' => 'Trilocale vicino a San Giovanni a Roma',
                    'description' => 'Trilocale spazioso e luminoso, vicino alla Basilica di San Giovanni.',
                    'address' => 'Via La Spezia, Roma',
                    'latitude' => 41.885532,
                    'longitude' => 12.522199,
                ],
                [
                    'title' => 'Monolocale in zona Santa Lucia a Napoli',
                    'description' => 'Monolocale accogliente, a pochi passi dal lungomare.',
                    'address' => 'Via Santa Lucia, Napoli',
                    'latitude' => 40.835564,
                    'longitude' => 14.240190,
                ],
                [
                    'title' => 'Appartamento luminoso a Palermo',
                    'description' => 'Appartamento luminoso e arredato con gusto, situato nel centro di Palermo.',
                    'address' => 'Via Maqueda, Palermo',
                    'latitude' => 38.115480,
                    'longitude' => 13.358765,
                ],
                [
                    'title' => 'Bilocale con balcone a Roma',
                    'description' => 'Bilocale con ampio balcone, ideale per cene all\'aperto.',
                    'address' => 'Via Cavour, Roma',
                    'latitude' => 41.895150,
                    'longitude' => 12.492071,
                ],
                [
                    'title' => 'Trilocale a Capodimonte a Napoli',
                    'description' => 'Trilocale tranquillo con vista su Capodimonte.',
                    'address' => 'Via Capodimonte, Napoli',
                    'latitude' => 40.858900,
                    'longitude' => 14.236470,
                ],
                [
                    'title' => 'Monolocale con vista Duomo a Milano',
                    'description' => 'Monolocale con vista sul Duomo, perfetto per turisti.',
                    'address' => 'Piazza del Duomo, Milano',
                    'latitude' => 45.464204,
                    'longitude' => 9.190016,
                ],
                [
                    'title' => 'Attico con vista Colosseo a Roma',
                    'description' => 'Attico di lusso con vista sul Colosseo, a pochi passi dal centro.',
                    'address' => 'Via dei Fori Imperiali, Roma',
                    'latitude' => 41.890210,
                    'longitude' => 12.492231,
                ],
                [
                    'title' => 'Monolocale in zona Vomero a Napoli',
                    'description' => 'Monolocale moderno e luminoso, situato nel quartiere Vomero.',
                    'address' => 'Via Scarlatti, Napoli',
                    'latitude' => 40.848720,
                    'longitude' => 14.224350,
                ],
                [
                    'title' => 'Appartamento con giardino a Palermo',
                    'description' => 'Appartamento con giardino privato, perfetto per famiglie.',
                    'address' => 'Via dei Pini, Palermo',
                    'latitude' => 38.112450,
                    'longitude' => 13.362800,
                ],
                [
                    'title' => 'Bilocale in zona Navigli a Milano',
                    'description' => 'Bilocale accogliente situato nel famoso quartiere Navigli.',
                    'address' => 'Alzaia Naviglio Grande, Milano',
                    'latitude' => 45.454134,
                    'longitude' => 9.170063,
                ],
                [
                    'title' => 'Trilocale in zona San Lorenzo a Roma',
                    'description' => 'Trilocale spazioso e luminoso, vicino all\'università.',
                    'address' => 'Via dei Sabelli, Roma',
                    'latitude' => 41.894802,
                    'longitude' => 12.512037,
                ],
                [
                    'title' => 'Monolocale vicino al mare a Napoli',
                    'description' => 'Monolocale accogliente a pochi passi dal mare.',
                    'address' => 'Via Posillipo, Napoli',
                    'latitude' => 40.837700,
                    'longitude' => 14.228400,
                ],
                [
                    'title' => 'Appartamento elegante a Palermo',
                    'description' => 'Appartamento di lusso con finiture di alta qualità, situato nel centro di Palermo.',
                    'address' => 'Piazza Castelnuovo, Palermo',
                    'latitude' => 38.115580,
                    'longitude' => 13.362190,
                ],
                [
                    'title' => 'Bilocale in zona Trastevere a Roma',
                    'description' => 'Bilocale affacciato su una delle piazze più belle di Roma.',
                    'address' => 'Piazza Trilussa, Roma',
                    'latitude' => 41.888120,
                    'longitude' => 12.466760,
                ],
                [
                    'title' => 'Trilocale con balcone a Napoli',
                    'description' => 'Trilocale luminoso con balcone, situato in una zona centrale.',
                    'address' => 'Via Toledo, Napoli',
                    'latitude' => 40.840240,
                    'longitude' => 14.251850,
                ],
                [
                    'title' => 'Monolocale moderno a Milano',
                    'description' => 'Monolocale moderno e funzionale, ideale per brevi soggiorni.',
                    'address' => 'Corso Como, Milano',
                    'latitude' => 45.481476,
                    'longitude' => 9.187491,
                ],
                [
                    'title' => 'Attico con terrazza a Roma',
                    'description' => 'Attico di lusso con terrazza panoramica, perfetto per cene all\'aperto.',
                    'address' => 'Via del Boccaccio, Roma',
                    'latitude' => 41.902300,
                    'longitude' => 12.496200,
                ],
                [
                    'title' => 'Monolocale in zona Mergellina a Napoli',
                    'description' => 'Monolocale accogliente a pochi passi dal lungomare.',
                    'address' => 'Lungomare Caracciolo, Napoli',
                    'latitude' => 40.836540,
                    'longitude' => 14.226380,
                ],
                [
                    'title' => 'Appartamento con patio a Palermo',
                    'description' => 'Appartamento con patio privato, ideale per rilassarsi.',
                    'address' => 'Via Notarbartolo, Palermo',
                    'latitude' => 38.118920,
                    'longitude' => 13.362560,
                ],
                [
                    'title' => 'Bilocale in zona Brera a Milano',
                    'description' => 'Bilocale affascinante situato nel cuore del quartiere Brera.',
                    'address' => 'Via Brera, Milano',
                    'latitude' => 45.469290,
                    'longitude' => 9.186519,
                ],
                [
                    'title' => 'Trilocale in zona Campo de\' Fiori a Roma',
                    'description' => 'Trilocale elegante in una delle zone più vive di Roma.',
                    'address' => 'Piazza Campo de\' Fiori, Roma',
                    'latitude' => 41.895637,
                    'longitude' => 12.470680,
                ],
                [
                    'title' => 'Monolocale con vista sul Vesuvio a Napoli',
                    'description' => 'Monolocale con vista mozzafiato sul Vesuvio.',
                    'address' => 'Via Vesuvio, Napoli',
                    'latitude' => 40.838200,
                    'longitude' => 14.236200,
                ],
                [
                    'title' => 'Appartamento centrale a Palermo',
                    'description' => 'Appartamento situato nel cuore di Palermo, vicino ai principali punti d\'interesse.',
                    'address' => 'Via Roma, Palermo',
                    'latitude' => 38.115400,
                    'longitude' => 13.361000,
                ],
                [
                    'title' => 'Bilocale con vista su San Pietro a Roma',
                    'description' => 'Bilocale accogliente con vista su San Pietro, ideale per visitare la città.',
                    'address' => 'Piazza San Pietro, Roma',
                    'latitude' => 41.9029,
                    'longitude' => 12.4534,
                ],
                [
                    'title' => 'Trilocale con terrazza a Napoli',
                    'description' => 'Trilocale spazioso con terrazza, perfetto per famiglie.',
                    'address' => 'Via Chiaia, Napoli',
                    'latitude' => 40.840000,
                    'longitude' => 14.245700,
                ],
                [
                    'title' => 'Monolocale elegante a Milano',
                    'description' => 'Monolocale elegante e moderno, situato in una zona centrale di Milano.',
                    'address' => 'Corso Buenos Aires, Milano',
                    'latitude' => 45.484000,
                    'longitude' => 9.205900,
                ],
                [
                    'title' => 'Attico con vista mare a Roma',
                    'description' => 'Attico con vista mare, ideale per chi cerca tranquillità e bellezza.',
                    'address' => 'Via della Lungomare, Roma',
                    'latitude' => 41.853000,
                    'longitude' => 12.445000,
                ],
                [
                    'title' => 'Monolocale vicino al centro a Napoli',
                    'description' => 'Monolocale accogliente a pochi passi dal centro di Napoli.',
                    'address' => 'Via Santa Lucia, Napoli',
                    'latitude' => 40.837800,
                    'longitude' => 14.247300,
                ],
                [
                    'title' => 'Appartamento rustico a Palermo',
                    'description' => 'Appartamento rustico con dettagli tradizionali, situato in una zona storica.',
                    'address' => 'Via Vittorio Emanuele, Palermo',
                    'latitude' => 38.115200,
                    'longitude' => 13.360500,
                ],
                [
                    'title' => 'Bilocale in zona Testaccio a Roma',
                    'description' => 'Bilocale moderno e ben arredato, situato nel caratteristico quartiere Testaccio.',
                    'address' => 'Via Marmorata, Roma',
                    'latitude' => 41.877400,
                    'longitude' => 12.469000,
                ],
                [
                    'title' => 'Trilocale con vista sul mare a Napoli',
                    'description' => 'Trilocale con vista sul mare, perfetto per chi ama il panorama.',
                    'address' => 'Via Posillipo, Napoli',
                    'latitude' => 40.837000,
                    'longitude' => 14.227000,
                ],
                [
                    'title' => 'Monolocale in zona Isola a Milano',
                    'description' => 'Monolocale moderno e confortevole, situato nel vivace quartiere Isola.',
                    'address' => 'Via Garigliano, Milano',
                    'latitude' => 45.489000,
                    'longitude' => 9.187800,
                ],

            ];


            // LINK ALLE IMMAGINI PER GLI APPARTAMENTI
            $apartments_images = [
                'https://images.pexels.com/photos/1571460/pexels-photo-1571460.jpeg',
                'https://images.pexels.com/photos/37347/office-sitting-room-executive-sitting.jpeg',
                'https://images.pexels.com/photos/275484/pexels-photo-275484.jpeg',
                'https://images.pexels.com/photos/439227/pexels-photo-439227.jpeg',
                'https://images.pexels.com/photos/271624/pexels-photo-271624.jpeg',
                'https://images.pexels.com/photos/1571460/pexels-photo-1571460.jpeg',
                'https://images.pexels.com/photos/106399/pexels-photo-106399.jpeg',
                'https://images.pexels.com/photos/271618/pexels-photo-271618.jpeg',
                'https://images.pexels.com/photos/276724/pexels-photo-276724.jpeg',
                'https://images.pexels.com/photos/531767/pexels-photo-531767.jpeg',
                'https://images.pexels.com/photos/1069363/pexels-photo-1069363.jpeg',
                'https://images.pexels.com/photos/279719/pexels-photo-279719.jpeg',
                'https://images.pexels.com/photos/276724/pexels-photo-276724.jpeg',
                'https://images.pexels.com/photos/1571456/pexels-photo-1571456.jpeg',
                'https://images.pexels.com/photos/1723208/pexels-photo-1723208.jpeg',
                'https://images.pexels.com/photos/276671/pexels-photo-276671.jpeg',
                'https://images.pexels.com/photos/439211/pexels-photo-439211.jpeg',
                'https://images.pexels.com/photos/1004682/pexels-photo-1004682.jpeg',
                'https://images.pexels.com/photos/534172/pexels-photo-534172.jpeg',
                'https://images.pexels.com/photos/689955/pexels-photo-689955.jpeg',
            ];

            // elimino tutte le immagini salvate
            Storage::disk('public')->delete(Storage::allFiles());

            // SALVO NEL SERVER LE IMMAGINI DI DEFAULT
            $num_of_good_images = 0;

            echo ("Caricamento immagini in corso. Attendere.");
            foreach ($apartments_images as $image) {
                echo (".");
                try {
                    $imageContent = file_get_contents($image);

                    // salvo l'immagine
                    Storage::put("img/default_image-{$num_of_good_images}.jpeg", $imageContent);

                    // aumento il contatore delle immagini salvate
                    $num_of_good_images += 1;
                } catch (Exception $e) {
                    // l'immagine non può essere scaricata
                }
            }

            // per ogni dato degli appartamenti genero un appartamento
            foreach ($apartments as $apartment_data) {

                $apartment_data['user_id'] = $users[random_int(0, $users_count - 1)]->id; // ciclo sugli utenti per evitare che se mancano degli id il seed fallisca

                $apartment = new Apartment($apartment_data);
                $apartment->price = random_int(10, 1000);
                $apartment->rooms = random_int(1, 10);
                $apartment->bathrooms = random_int(1, 6);
                $apartment->square_meters = random_int(30, 300);
                $apartment->beds = random_int(1, 20);
                $apartment->is_visible = true;

                // seleziono un'immagine causale tra quelle di default
                $random_img_number = random_int(0, $num_of_good_images - 1);
                $apartment->image = "img/default_image-{$random_img_number}.jpeg";
                $apartment->save();
            }
        } else {
            echo ('Non ci sono utenti nel DB, impossibile generare gli appartamenti!');
            return;
        }
    }
}
