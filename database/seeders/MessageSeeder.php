<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seedingData = [
            [
                'email' => 'alice.rossi@example.com',
                'content' => 'Buongiorno, sono interessata all\'appartamento che avete in affitto. Potreste fornirmi maggiori dettagli, come il prezzo e la disponibilità per una visita? Grazie!',
            ],
            [
                'email' => 'luca.bianchi@example.com',
                'content' => 'Ciao, ho visto l\'annuncio per l\'appartamento e vorrei sapere se è ancora disponibile. Mi piacerebbe anche sapere se ci sono spese condominiali aggiuntive. Grazie!',
            ],
            [
                'email' => 'giulia.verdi@example.com',
                'content' => 'Salve, sono Giulia e sono molto interessata all\'appartamento. Potrei fissare un appuntamento per vederlo di persona? Attendo vostre notizie. Grazie!',
            ],
            [
                'email' => 'marco.esposito@example.com',
                'content' => 'Buongiorno, sono Marco e vorrei richiedere ulteriori informazioni sull\'appartamento in affitto. È possibile avere una descrizione più dettagliata e sapere se ci sono restrizioni per gli animali domestici?',
            ],
            [
                'email' => 'francesca.romano@example.com',
                'content' => 'Ciao, sono Francesca e vorrei sapere se l\'appartamento è ancora disponibile. Sono interessata a capire anche quali sono le condizioni del contratto di affitto. Grazie in anticipo!',
            ],
            [
                'email' => 'andrea.ferrari@example.com',
                'content' => 'Salve, ho visto il vostro annuncio per l\'appartamento e vorrei ricevere ulteriori dettagli, soprattutto riguardo ai servizi inclusi e alla zona in cui si trova. Grazie!',
            ],
            [
                'email' => 'martina.gallo@example.com',
                'content' => 'Buongiorno, sono Martina e sono molto interessata all\'appartamento in affitto. Mi potrebbe inviare maggiori informazioni e la disponibilità per una visita?',
            ],
            [
                'email' => 'davide.conti@example.com',
                'content' => 'Ciao, sono Davide e ho visto il vostro appartamento in affitto. Vorrei sapere se è possibile negoziare il prezzo e se ci sono possibilità di rinnovo del contratto. Grazie!',
            ],
            [
                'email' => 'elena.ricci@example.com',
                'content' => 'Salve, sono Elena e sono molto interessata al vostro appartamento. Potrei avere maggiori dettagli sul contratto e sulle condizioni di affitto?',
            ],
            [
                'email' => 'stefano.moretti@example.com',
                'content' => 'Buongiorno, sono Stefano e vorrei sapere se l\'appartamento è ancora disponibile. Mi piacerebbe avere anche informazioni su eventuali lavori di ristrutturazione recenti. Grazie!',
            ],
        ];

        $apartments = Apartment::all();
        $apartments_length = count($apartments);

        #se ci sono appartamenti
        if ($apartments_length > 0) {
            foreach ($seedingData as $data) {
                $message = new Message();
                $message->apartment_id = $apartments[random_int(0, $apartments_length - 1)]->id;
                $message->email = $data['email'];
                $message->name = "Gianbattista";
                $message->content = $data['content'];
                $message->save();
            }
        } else {
            echo ("!!!!!!!!!!!!!!!\nNon ci sono appartamenti impossibile generare i messaggi.\n!!!!!!!!!!!!!!!");
            return;
        }
    }
}
