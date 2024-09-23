<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\User;
use App\Models\Visit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class Apartments extends Controller
{


    public function search(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'search' => 'required|string',
            'range' => 'nullable|integer',
            'beds' => 'nullable|integer',
            'rooms' => 'nullable|integer',
            'square_meters' => 'nullable|integer',
            'min_price' => 'nullable|integer',
            'max_price' => 'nullable|integer'
        ]);

        // Se la validazione fallisce
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Dati non validi, il search è obbligatorio e deve essere una stringa il range è opzionale ma deve essere un integer',
                'errors' => $validator->errors()
            ], 422); // Codice HTTP 422 Unprocessable Entity
        }

        $query_result = urldecode($request->query('search'));
        $response = Http::withUrlParameters([
            'endpoint' => 'https://api.tomtom.com/search/2/geocode',
            'query' => $query_result,
            'ext' => 'json',
            'myKey' => env('TOM_TOM_KEY'),
        ])->withoutVerifying()->get('{+endpoint}/{query}.{ext}?key={myKey}&limit=1&language=it-IT');


        //posizione ricercata dall'utente
        $response_results = json_decode($response->body())->results;
        if (count($response_results) > 0) {
            $searched_position = $response_results[0]->position;
        } else {
            return response()->json([
                'status' => 'ok',
                'message' => 'nessun riusltato trovato',
                'apartments' => []
            ]); // Codice HTTP 422 Unprocessable Entity
        }
        // Longitudine e latitudine dell'utente
        $userLatitude = $searched_position->lat;
        $userLongitude = $searched_position->lon;

        if ($request->range == null) {
            $radius = 20000; // Raggio in metri (20 km = 20000 metri)
        } else {
            $radius = $request->range * 1000;
        }

        if ($request->beds == null) {
            $request->merge(['beds' => 0]);
        }

        if ($request->rooms == null) {
            $request->merge(['rooms' => 0]);
        }

        if ($request->square_meters == null) {
            $request->merge(['square_meters' => 0]);
        }

        if ($request->min_price == null) {
            $request->merge(['min_price' => 0]);
        }

        if ($request->max_price == null) {
            $request->merge(['max_price' => 9999]);
        }


        //prendo dalla request gli id
        $services_id_list = $request->query('services');

        // ottengo la data attuale
        $currentDateTime = Carbon::now();

        // unisco le tabelle appartamenti con apartment_sponsor e apartment_service
        // da apartment sponsor prendo il max end time perchè se c'è anche solo un end time nel futuro allora è sponsorizzato
        $query = Apartment::selectRaw("
    apartments.id, apartments.title, apartments.slug, apartments.image, apartments.address, apartments.bathrooms, apartments.price, apartments.user_id, apartments.beds, apartments.rooms,
    ST_Distance_Sphere(point(apartments.longitude, apartments.latitude), point(?, ?)) as distance,
    MAX(apartment_sponsor.end_time > ?) as is_sponsored", [$userLongitude, $userLatitude, $currentDateTime])
            ->leftJoin('apartment_sponsor', 'apartments.id', '=', 'apartment_sponsor.apartment_id')
            ->join('apartment_service', 'apartments.id', '=', 'apartment_service.apartment_id')
            ->whereRaw(
                "ST_Distance_Sphere(point(apartments.longitude, apartments.latitude), point(?, ?)) < ?",
                [$userLongitude, $userLatitude, $radius]
            )
            ->where('rooms', '>=', $request->rooms)
            ->where('beds', '>=', $request->beds)
            ->where('square_meters', '>=', $request->square_meters)
            ->where('price', '>=', $request->min_price)
            ->where('price', '<=', $request->max_price)
            ->where('is_visible', true)
            ->groupBy('apartments.id')
            ->orderByDesc('is_sponsored') // Ordinamento per appartamenti sponsorizzati
            ->orderBy('distance', 'asc'); // Ordinamento per distanza

        // Verifica se la lista dei servizi non è vuota allora filtro per i servizi
        if (!empty($services_id_list)) {
            $query->whereIn('apartment_service.service_id', $services_id_list)
                ->havingRaw('COUNT(DISTINCT apartment_service.service_id) = ?', [count($services_id_list)]);
        }

        // Esegui la query e pagina i risultati
        $apartments = $query->paginate(10);

        foreach ($apartments as $apartment) {
            $apartment->userName = User::where('id', $apartment->user_id)->first()->name;
        }
        // Restituisci il risultato come JSON
        return response()->json([
            'status' => 'ok',
            'apartments' => $apartments
        ]);
    }


    public function get_sponsored()
    {
        $currentDateTime = Carbon::now();

        $apartments = Apartment::whereHas('sponsors', function ($query) use ($currentDateTime) {
            $query->where('start_time', '<=', $currentDateTime)
                ->where('end_time', '>=', $currentDateTime);
        })->get();

        foreach ($apartments as $apartment) {
            $apartment->userName = User::where('id', $apartment->user_id)->first()->name;
        }

        return response()->json([
            'status' => 'ok',
            'apartments' => $apartments
        ]);
    }

    public function store_visit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'apartment_id' => 'required|integer',
        ]);

        // Se la validazione fallisce
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Bisogna fornire un ID appartamento.',
                'errors' => $validator->errors()
            ], 422); // Codice HTTP 422 Unprocessable Entity
        }

        $apartment = Apartment::where('id', $request->apartment_id)->exists();

        if (!$apartment) {
            return response()->json([
                'status' => 'error',
                'message' => 'L ID non corrisponde a nessun appartamento valido'
            ], 422); // Codice HTTP 422 Unprocessable Entity
        }

        // prendo l'ip del client
        $ip_address = $request->ip();

        $visit = new Visit();
        $visit->apartment_id = $request->apartment_id;
        $visit->ip_address = $ip_address;
        $visit->save();

        return response()->json([
            'status' => 'ok'
        ]);
    }

    public function show_apartment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'apartment_slug' => 'required|string',
        ]);

        // Se la validazione fallisce
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Bisogna fornire uno slug di un appartamento.',
                'errors' => $validator->errors()
            ], 422); // Codice HTTP 422 Unprocessable Entity
        }

        // controllo che esista l'appartamento corrispondente
        $apartment = Apartment::where('slug', $request->apartment_slug)->with('services', 'user')->firstOrFail();

        if (!$apartment) {
            return response()->json([
                'status' => 'error',
                'message' => 'L ID non corrisponde a nessun appartamento valido'
            ], 422); // Codice HTTP 422 Unprocessable Entity
        }

        return response()->json([
            'status' => 'ok',
            'apartment' => $apartment
        ]);
    }
}
